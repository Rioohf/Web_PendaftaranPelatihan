@extends('web.layouts.app')

@section('content1')
<form action="#" method="post" enctype="multipart/form-data">
    @csrf
  <main class="d-flex align-items-center">
    <div class="container mt-5">
        <div id="wizard">
          <section>
            <div class="href-target" id="intro"></div>
            <h1 class="package-name">PPKD Jakarta Pusat</h1>
            <p>
                Terima kasih telah mendaftar pelatihan PPKD Jakarta Pusat. Saat ini, pendaftaran Anda telah kami terima dan sedang dalam proses verifikasi.
            </p>
            <strong>Untuk informasi selanjutnya, harap pantau terus Instagram kami di <a href="https://www.instagram.com/ppkdjp/?hl=id">@ppkdjp</a>. Kami akan mengumumkan hasil seleksi dan informasi penting lainnya melalui akun tersebut.</strong>
            <p>Terima kasih atas perhatian dan partisipasinya!</p>
          </section>
        </div>
    </div>
  </main>
</form>
@endsection
