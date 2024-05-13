$(document).ready(function(){
     
     //untuk disabled tombol ubah
     $("#btnUbah").prop("disabled",true);

     $('#table-poktan').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "info": false,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 5,
        "bDestroy": true,
        "dom": '<"top"f>rtip',
        "fnDrawCallback": function( oSettings ) {
        },
        "ajax": {
          "url": "./app/controller/controllerPoktan.php",
          "type": "POST",
          "data" : {
            perintah : "recordDataPoktan"
          },
          error: function (request, textStatus, errorThrown) {
            swal(request);
          }
        },
  
        columns: [
        { "data": null,render :  function ( data, type, full, meta ) {
          return meta.row + 1;
        }},
        { "data": "idpoktan"},
        { "data": "nama_poktan"},
        { "data": "jumlah_Poktan"},
        { "data": "telp" },
        { "data": "kota" },
        { "data": null, render : function(data,type,row){
          return "<button title='Edit' class='btn btn-edit-poktan btn-warning btn-xs'><i class='fafa-pencil'></i> Edit</button>  <button title='Delete' class='btn btn-hapus-poktan btn-danger btn- xs'><i class='fa fa-remove'></i> Delete</button> ";
        }     },
        ]
      });

      //kode menghapus inputan
      function clearInputan(){
         $("#idPoktan").val('');
         $("#namaPoktan").val('');
         $("#jumlahPoktan").val('');
         $("#telpPoktan").val('');
         $("#kotaPoktan").val('');
      }


     //KodeSimpan
     $("#btnSimpan").click(function(){
          $.ajax({
           url:"./app/controller/controllerPoktan.php",
           type:"POST",
           data:{
               idpoktan:$('#idPoktan').val(),
               namapoktan:$('#namaPoktan').val(),
               jumlahpoktan:$('#jumlahPoktan').val(),
               kotapoktan:$('#kotaPoktan').val(),
               telppoktan:$('#telpPoktan').val(),
               perintah:"Simpan_Data"
           },
           success:function(respond){
               $hasil=JSON.parse(respond);
               if ($hasil['duplikasi']=="Ada")
               {
                 swal($hasil['pesan']);
                 $('#namaPoktan').val($hasil['data'][0]['nama_poktan']);
                 $('#jumlahPoktan').val($hasil['data'][0]['jumlah_Poktan']);
                 $('#telpPoktan').val($hasil['data'][0]['telp']);
                 $('#kotaPoktan').val($hasil['data'][0]['kota'])
               } else{

                 swal($hasil['pesan']);
                 var table = $('#table-poktan').DataTable();
                 table.ajax.reload(null,false);
                 clearInputan();

               }
              
           }
       });
     });

     //kode menampilkan 1 baris record dan aktifasi tombol Ubah
     $(document).on("click",".btn-edit-poktan",function(){
        $("#btnUbah").prop("disabled",false);
          var posisiBaris = $(this).parents('tr');
          if (posisiBaris .hasClass('child')) 
          {
              posisiBaris = posisiBaris .prev();
          }
          var table = $('#table-poktan').DataTable();
          var data = table.row( posisiBaris ).data();
          $('#idPoktan').val(data.idpoktan);
          $('#namaPoktan').val(data.nama_poktan);
          $('#jumlahPoktan').val(data.jumlah_Poktan);
          $('#telpPoktan').val(data.telp);
          $('#kotaPoktan').val(data.kota);
    });


     //KodeUbah
     $("#btnUbah").click(function(){
          $.ajax({
           url:"./app/controller/controllerPoktan.php",
           type:"POST",
           data:{
               idpoktan:$('#idPoktan').val(),
               namapoktan:$('#namaPoktan').val(),
               jumlahpoktan:$('#jumlahPoktan').val(),
               kotapoktan:$('#kotaPoktan').val(),
               telppoktan:$('#telpPoktan').val(),
               perintah:"Ubah_Data"
           },
           success:function(respond){
               $hasil=JSON.parse(respond);
               swal($hasil['pesan']);
               var table = $('#table-poktan').DataTable();
                table.ajax.reload(null,false);
                clearInputan();
           }
       });
     });

       //kode menghapus data poktan perbaris
       $(document).on("click",".btn-hapus-poktan",function(){
     
          var posisiBaris = $(this).parents('tr');
          if (posisiBaris .hasClass('child')) 
          {
              posisiBaris = posisiBaris .prev();
          }
          var table = $('#table-poktan').DataTable();
          var data = table.row( posisiBaris ).data();
          $.ajax({
            url:"./app/controller/controllerPoktan.php",
            type:"POST",
            data:{
                idpoktan:data.idpoktan,
                perintah:"Hapus_Data"
            },
            success:function(respond){
                $hasil=JSON.parse(respond);
                swal($hasil['pesan']);
                var table = $('#table-poktan').DataTable();
                 table.ajax.reload(null,false);
            }
        });
       
    });



});