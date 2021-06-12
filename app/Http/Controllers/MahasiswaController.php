public function index()
{
$mahasiswa = \App\Models\Mahasiswa::All();
return view('mahasiswa' , ['mahasiswa' => $mahasiswa]);
}
public function create()
{
return view('tambah');
}
public function store(Request $request)
{
//Menangkap Data Yang Diinput
$nbi = $request->get('nbi');
$nama_mhs = $request->get('nama_mhs');
//Menyimpan data kedalam tabel
$save_mhs = new \App\Models\Mahasiswa;
$save_mhs->nbi = $nbi;
$save_mhs->nama_mhs = $nama_mhs;
$save_mhs->save();
return redirect()->route('mahasiswa.index');
}
$mhs_edit = \App\Models\Mahasiswa::findOrFail($id);
return view('edit', ['mahasiswa' => $mhs_edit]);
public function update(Request $request, $id)
{
$mhs = \App\Models\Mahasiswa::findOrFail($id);
$mhs->nama_mhs = $request->get('nama_mhs');
$mhs->nbi = $request->get('nbi');
$mhs->save();
return redirect()->route('mahasiswa.index', [$id]);
}
public function destroy($id)
{
$mhs = \App\Models\Mahasiswa::findOrFail($id);
$mhs->delete();
return redirect()->route('mahasiswa.index');
}
