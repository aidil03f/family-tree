@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit List Family
                </div>
                <div class="card-body">
                    <form action="{{ route('family.update',$family) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-select" onchange="onChangeHandlerStatus(this)" required>
                                <option value="" disabled selected>Choose One!</option>
                                <option {{ $family->status_family == 'Kepala keluarga' ? 'selected':'' }} value="Kepala keluarga">Kepala Keluarga</option>
                                <option {{ $family->status_family == 'Orang tua' ? 'selected':'' }} value="Orang tua">Orang tua</option>
                                 <option {{ $family->status_family == 'Bibi' ? 'selected':'' }} value="Bibi">Bibi</option>
                                <option {{ $family->status_family == 'Anak' ? 'selected':'' }} value="Anak">Anak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" name="name" id="name" placeholder="Nama" value="{{ $family->name }}" class="form-control">
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-select" required>
                                <option value="" disabled selected>Choose One!</option>
                                <option {{ $family->gender == 'male' ? 'selected':'' }} value="male">Laki-Laki</option>
                                <option {{ $family->gender == 'female' ? 'selected':'' }} value="female">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3" id="form-parent">
                            <label class="form-label" for="parent" id="labelParent"></label>
                            <select name="parent" id="parent" class="form-select">
                                <option value="" disabled selected>Choose One!</option>
                                @foreach ($data as $item)
                                    <option {{ $family->parent == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary"> Update</button>
                            <a href="{{ route('family.index') }}" class="btn btn-danger"> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    checkStatus();
    function checkStatus(){
        let status = document.getElementById('status').value;
        if(status == 'Kepala keluarga'){
            document.getElementById('form-parent').hidden = true;
            document.getElementById('parent').required = false;
        } else {
            if(status == 'Anak'){
                document.getElementById('labelParent').innerText = 'Nama Bapak/Ibu';
                document.getElementById('parent').required = true;
                document.getElementById('form-parent').hidden = false;
            } else if(status == 'Orang tua' || 'Bibi') {
                document.getElementById('labelParent').innerText = 'Nama Kepala Keluarga';
                document.getElementById('parent').required = true;
                document.getElementById('form-parent').hidden = false;
            } 
        }
    }


    function onChangeHandlerStatus(target){
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
