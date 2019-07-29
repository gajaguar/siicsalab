<?php

namespace Sislab\Http\Controllers;

use Sislab\Bank;

use Illuminate\Http\Request;

class BankController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param \Sislab\Bank $bank
   * @return \Illuminate\Http\Response
   */
  public function show(Bank $bank)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \Sislab\Bank $bank
   * @return \Illuminate\Http\Response
   */
  public function edit(Bank $bank)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Sislab\Bank $bank
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Bank $bank)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \Sislab\Bank $bank
   * @return \Illuminate\Http\Response
   */
  public function destroy(Bank $bank)
  {
    //
  }
}
