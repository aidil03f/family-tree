@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Create List Family
                </div>
                <div class="card-body">
                    <form action="{{ route('family.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-select" onchange="checkStatus(this)" required>
                                <option value="" disabled selected>Choose One!</option>
                                <option value="Kepala keluarga">Kepala Keluarga</option>
                                <option value="Orang tua">Orang tua</option>
                                 <option value="Bibi">Bibi</option>
                                <option value="Anak">Anak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" name="name" id="name" placeholder="Nama" class="form-control">
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-select" required>
                                <option value="" disabled selected>Choose One!</option>
                                <option value="male">Laki-Laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3" id="form-parent">
                            <label class="form-label" for="parent" id="labelParent"></label>
                            <select name="parent" id="parent" class="form-select">
                                <option value="" disabled selected>Choose One!</option>
                                @foreach ($family as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary"> Save</button>
                            <a href="{{ route('family.index') }}" class="btn btn-danger"> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('form-parent').hidden = true;
    function checkStatus(target){
        if(target.value == 'Kepala keluarga'){
            document.getElementById('form-parent').hidden = true;
            document.getElementById('parent').required = false;
        } else {
            if(target.options[target.selectedIndex].text == 'Anak'){
                document.getElementById('labelParent').innerText = 'Nama Bapak/Ibu';
                document.getElementById('parent').required = true;
                document.getElementById('form-parent').hidden = false;
            } else if(target.options[target.selectedIndex].text == 'Orang tua' || 'Bibi') {
                document.getElementById('labelParent').innerText = 'Nama Kepala Keluarga';
                document.getElementById('parent').required = true;
                document.getElementById('form-parent').hidden = false;
            } 
        }
    }
</script>
@endsection
