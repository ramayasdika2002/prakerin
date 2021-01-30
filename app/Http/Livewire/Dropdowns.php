<?php

namespace App\Http\Livewire;

use App\Models\Rw;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use Livewire\Component;

class Dropdowns extends Component
{
    public $provinsis;
    public $kotas;
    public $kecamatans;
    public $desas;
    public $rws;

    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selecteddesa = null;
    public $selectedRw = null;

    public function mount($selectedRw = null)
    {
        $this->provinsis = Provinsi::all();
        $this->kotas = collect();
        $this->kecamatans = collect();
        $this->desas = collect();
        $this->rws = collect();
        $this->selectedRw = $selectedRw;

        if (!is_null($selectedRw)) {
            $rw = Rw::with('desa.kecamatan.kota.provinsi')->find($selectedRw);
            if ($rw) {
                $this->rw = Rw::where('id_desa', $rw->id_desa)->get();
                $this->desa = Desa::where('id_kecamatan', $rw->desa->id_kecamatan)->get();
                $this->kecamatan = Kecamatan::where('id_kota', $rw->desa->kecamatan->id_kota)->get();
                $this->kota = Kota::where('id_provinsi', $rw->desa->kecamatan->kota->id_provinsi)->get();
                $this->selectedProvinsi =$rw->desa->kecamatan->kota->id_provinsi;
                $this->selectedKota = $rw->desa->kecamatan->id_kota;
                $this->selectedKecamatan = $rw->desa->id_kecamatan;
                $this->selectedDesa = $rw->id_desa;
            }
        }
    }

    public function render()
    {
        return view('livewire.dropdowns');
    }

    public function updatedSelectedProvinsi($provinsi)
    {
        $this->kota = Kota::where('id_provinsi', $provinsi)->get();
        $this->selectedKota = NULL;
        $this->selectedKecamatan = NULL;
        $this->selectedDesa = NULL;
        $this->selectedRw = NULL;
    }
    public function updatedSelectedKota($kota)
    {
        $this->kecamatan = Kecamatan::where('id_kota', $kota)->get();
        $this->selectedKecamatan = NULL;
        $this->selectedDesa = NULL;
        $this->selectedRw = NULL;
    }

    public function updatedSelectedKecamatan($kecamatan)
    {
        $this->desa = Desa::where('id_kecamatan', $kecamatan)->get();
        $this->selectedDesa = NULL;
        $this->selectedRw = NULL;
    }
    public function updatedSelectedDesa($desa)
    {
        if (!is_null($desa)) {
            $this->rw = Rw::where('id_desa', $desa)->get();
        }else{
            $this->selectedRw = NULL;
        }
    }

}
