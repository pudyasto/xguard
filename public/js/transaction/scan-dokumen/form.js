var html5QrCode;

$(function () {

  _babelPolyfill = false;
  html5QrCode = new Html5Qrcode("preview");
  const config = { fps: 1 };

  $('#modal-scan-document').on('hidden.bs.modal', function () {
    if (html5QrCode.getState() == 2) {
      html5QrCode.stop().then((ignore) => {
        // QR Code scanning is stopped.

      }).catch((err) => {
        console.log("Cant stop camera");
        // Stop failed, handle it.
      });
    }
  });

  $('#modal-scan-document').on('shown.bs.modal', function () {
    console.log('Start camera')
    // If you want to prefer front camera
    html5QrCode.start(
      {
        facingMode: "environment"
      },
      config,
      onScanSuccess);
  });



});

function onScanSuccess(decodedText, decodedResult) {

  if (isJson(decodedText)) {
    let text = JSON.parse(decodedText);

    if (text.no_dokumen) {
      $('#no_dokumen').val(text.no_dokumen);
      $('#asal').val(text.asal);
      $('#tujuan').val(text.tujuan);
      $('#keterangan').val(text.keterangan);
      Swal.fire({
        title: "Informasi",
        html: "Dokumen berhasil di scan!",
        icon: "success",
      }).then((result) => {
        $('#modal-scan-document').modal('hide');
        html5QrCode.resume();
      });
    } else {
      Swal.fire({
        title: "Peringatan",
        html: "<strong>Format JSON Berbeda</strong> <br>" + decodedText,
        icon: "info",
      }).then((result) => {
        $('#modal-scan-document').modal('hide');
        html5QrCode.resume();
      });
    }
  } else {
    Swal.fire({
      title: "Peringatan",
      html: "<strong>Format QR-Code Berbeda</strong> <br>" + decodedText,
      icon: "info",
    }).then((result) => {
      html5QrCode.resume();
      $('#modal-scan-document').modal('hide');
      // if (isUrlValid(decodedText)) {
      //   window.open(decodedText);
      // }
    });
  }
  html5QrCode.pause(true);

}