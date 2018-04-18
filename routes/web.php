<?php

use App\Http\Controllers\BidangPerusahaanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\PenempatanController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\SuratPengantarController;
use App\Http\Controllers\SuratPermohonanController;
use App\Http\Controllers\SuratTugasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReferensiController;
use App\Http\Controllers\PersyaratanController;

/*
|---------------------------------------------------------------------|-----
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('check_absen','CommonController@status_absen');

Route::get('/', function () {
    if(Auth::user()){
      return redirect('home');
    }else{
      return redirect('login');
    }
});

Route::get('home', function () {
    if(Auth::user()){
        return (new DashboardController)->index();
    }else{
      return redirect('login');
    }
});

Route::get('pengembang', function () {
  if(Auth::user()){
      return view("dev.index");
    }else{
      return redirect('login');
    }
});

Route::get('permainan', function () {
  if(Auth::user()){
      return view("permainan.index");
    }else{
      return redirect('login');
    }
});


Route::get('permainan/{game}', function($game){
  if(Auth::user()){
    return view('permainan.index2', compact("game"));
  }else{
    return redirect('login');
  }
});

//bkk

Route::get('referensi', function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1 || Auth::user()->id_role==9) {
      return (new ReferensiController)->index();
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});
Route::get('rayon/add', function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new ReferensiController)->create_rayon();
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});
Route::get('rombel/add', function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new ReferensiController)->create_rombel();
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});
Route::get('jurusan/add', function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new ReferensiController)->create_jurusan();
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});
Route::post('rayon/add', 'ReferensiController@store_rayon');
Route::post('rombel/add', 'ReferensiController@store_rombel');
Route::post('jurusan/add', 'ReferensiController@store_jurusan');
Route::post('bidangperusahaan', 'BidangPerusahaanController@store');

Route::get('bidangperusahaan', function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new BidangPerusahaanController)->index();
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});
Route::get('bidangperusahaan/destroy/{id}', function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new BidangPerusahaanController)->destroy($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
})->name('bidangperusahaan.destroy');

Route::get('perusahaan', function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1 || Auth::user()->id_role==9) {
      return (new PerusahaanController)->index();
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});
Route::get('perusahaan/add',function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new PerusahaanController)->create();
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});
Route::get('perusahaan/del/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new PerusahaanController)->destroy($id);
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});
Route::post('perusahaan/add','PerusahaanController@store');
Route::get('perusahaan/e/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new PerusahaanController)->edit($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});
Route::post('perusahaan/e/{id}','PerusahaanController@update');


Route::get('suratpermohonan',function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1 || Auth::user()->id_role==9) {
      return (new SuratPermohonanController)->index();
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});

Route::get('suratpermohonan/add',function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new SuratPermohonanController)->create();
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('suratpermohonan/e/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new SuratPermohonanController)->edit($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('suratpermohonan/print/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1 || Auth::user()->id_role==9) {
      return (new SuratPermohonanController)->show($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('suratpermohonan/del/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new SuratPermohonanController)->destroy($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});
Route::get('suratpengantar',function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1 || Auth::user()->id_role==9) {
      return (new SuratPengantarController)->index();
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('suratpengantar/add',function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new SuratPengantarController)->create();
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('suratpengantar/e/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new SuratPengantarController)->edit($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('suratpengantar/print/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1 || Auth::user()->id_role==9) {
      return (new SuratPengantarController)->show($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('suratpengantar/del/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new SuratPengantarController)->destroy($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('surattugas',function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1 || Auth::user()->id_role==9) {
      return (new SuratTugasController)->index();
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('surattugas/add',function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new SuratTugasController)->create();
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('surattugas/e/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new SuratTugasController)->edit($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('surattugas/print/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1 || Auth::user()->id_role==9) {
      return (new SuratTugasController)->show($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('surattugas/del/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new SuratTugasController)->destroy($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::post('suratpermohonan/add','SuratPermohonanController@store');
Route::post('suratpermohonan/e/{id}','SuratPermohonanController@update');

Route::post('suratpengantar/add','SuratPengantarController@store');
Route::post('suratpengantar/e/{id}','SuratPengantarController@update');

Route::post('surattugas/add','SuratTugasController@store');
Route::post('surattugas/e/{id}','SuratTugasController@update');

//bkk, kaprog, pembimbing

Route::get('siswa', function(){
  if(Auth::user()){
    if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 4 || Auth::user()->id_role==9) {
      return (new SiswaController)->index();
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});

//end

Route::get('siswa/add', function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new SiswaController)->create();
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});
Route::post('siswa/add', 'SiswaController@store');
Route::get('siswa/e/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new SiswaController)->edit($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});
Route::post('siswa/e/{id}','SiswaController@update');
Route::get('siswa/del/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new SiswaController)->destroy($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('user', function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new UserController)->index();
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});
Route::get('user/add', function(){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new UserController)->create();
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});
Route::post('user/add', 'UserController@store');
Route::get('user/e/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new UserController)->edit($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});
Route::post('user/e/{id}','UserController@update');
Route::get('user/del/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==1) {
      return (new UserController)->destroy($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

//endbkk

//kaprog

Route::get('penempatan', function(){
  if(Auth::user()){
    if (Auth::user()->id_role==2 || Auth::user()->id_role==9) {
      return (new PenempatanController)->index();
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});
Route::get('penempatan/add/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role==2) {
      return (new PenempatanController)->create($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});
Route::post('penempatan/add/{id}', 'PenempatanController@store');

//endkaprog

//Siswa

Route::get('jurnal/print', function(){
  if(Auth::user()){
    if (Auth::user()->status == 5) {
      return (new JurnalController)->print();
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});

Route::get('jurnal', function(){
  if(Auth::user()){
    if (Auth::user()->status == 5) {
      return (new JurnalController)->index();
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});
Route::get('jurnal/add', function(){
  if(Auth::user()){
    if (Auth::user()->status == 5) {
      return (new JurnalController)->create();
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});
Route::get('kehadiran', function(){
  if(Auth::user()){
    if (Auth::user()->status == 5) {
      return (new KehadiranController)->index();
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});
Route::get('kehadiran/print', function(){
  if(Auth::user()){
    if (Auth::user()->status == 5) {
      return (new KehadiranController)->print();
    }else{
      return redirect('404');
    }
  }else{
    return redirect('404');
  }
});

Route::get('kehadiran/add', function(){
  if(Auth::user()){
    if (Auth::user()->status == 5) {
      return (new KehadiranController)->create();
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});
Route::post('jurnal/add', 'JurnalController@store');
Route::post('kehadiran/add', 'KehadiranController@store');
Route::post('home', 'DashboardController@set_area');

//endsiswa

//pengisipersyaratan

Route::get('persyaratan', function(){
  if(Auth::user()){
    if (Auth::user()->id_role == 2 || Auth::user()->id_role > 3 && Auth::user()->id_role!=9) {
      return (new PersyaratanController)->index();
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});
Route::post('persyaratan', 'PersyaratanController@store');

//endpengisipersyaratan


//endbkk

Route::get('siswa/{id}',function($id){
  if(Auth::user()){
    if (Auth::user()->id_role == 2 || Auth::user()->id_role == 4 || Auth::user()->id_role==9) {
      return (new PersyaratanController)->index2($id);
    }else{
      return redirect('404');  
    }
  }else{
    return redirect('404');
  }
});

Route::get('/logout', function()
{
  Auth::logout();
  return redirect('login');
});

