<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Tagihan;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->role == 'teller') {
            if ($request->get('jenis')) {
                $tagihans = Tagihan::where('pembayaran_id', $request->get('jenis'))->where('created_at', '>=' ,$request->get('awal'))->where('created_at', '<=' , $request->get('akhir'))->get();
                $pembayarans = Pembayaran::all();
                
                return view('tagihan.index', compact('tagihans', 'pembayarans'));
            }else{
                $pembayarans = Pembayaran::all();
                $tagihans = Tagihan::all();
                // dd($tagihans);

                return view('tagihan.index', compact('tagihans', 'pembayarans'));
            }
        }else{
            if ($request->get('jenis') && $request->get('awal') && $request->get('akhir')) {
                $tagihans = Tagihan::where('pembayaran_id', $request->get('jenis'))->where('created_at', '>=' ,$request->get('awal'))->where('created_at', '<=' , $request->get('akhir'))->where('user_id', Auth::user()->id)->get();
                $pembayarans = Pembayaran::all();
                
                return view('tagihan.index', compact('tagihans', 'pembayarans'));
            }else{
                $pembayarans = Pembayaran::all();
                $tagihans = Tagihan::where('user_id', Auth::user()->id)->get();

                return view('tagihan.index', compact('tagihans', 'pembayarans'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembayarans = Pembayaran::all();

        return view('tagihan.create', compact('pembayarans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('bukti_pembayaran')) {
            $data['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti', 'public');
        }

        Tagihan::create($data);

        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayarans = Pembayaran::all();
        $transaksi = Tagihan::find($id);

        return view('tagihan.edit', compact('pembayarans', 'transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        if ($request->file('bukti_pembayaran')) {
            $data['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti', 'public');
        }

        Tagihan::find($id)->update($data);

        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tagihan::find($id)->delete();

        return redirect()->back();
    }

    public function konfirmasi($id)
    {
        Tagihan::find($id)->update([
            'status' => 'terkonfirmasi'
        ]);

        return redirect()->back();
    }

    public function download($id)
    {
        $bukti = Tagihan::find($id)->bukti_pembayaran;

        return response()->download(storage_path('app/public/'.$bukti));
    }

    public function pdf(Request $request)
    {
        if (Auth::user()->role == 'teller') {
            $tagihans = Tagihan::where('pembayaran_id', $request->jenis)->where('created_at', '>=', $request->awal)->where('created_at', '<=', $request->akhir)->get();
 
            $pdf = PDF::loadview('pdf.pdf',['tagihans'=>$tagihans]);
            return $pdf->stream('laporan.pdf');
        }else{
            $tagihans = Tagihan::where('pembayaran_id', $request->jenis)->where('created_at', '>=', $request->awal)->where('created_at', '<=', $request->akhir)->where('user_id', Auth::user()->id)->get();
 
            $pdf = PDF::loadview('pdf.pdf',['tagihans'=>$tagihans]);
            return $pdf->stream('laporan.pdf');
        }
    }
}

