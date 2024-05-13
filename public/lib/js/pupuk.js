$(document).ready(function(){

 //mencari data poktan berdasarkan ID
 $("#idPoktan").keyup(function(){
    $.ajax({
           url:"./app/controller/controllerPupuk.php",
           type:"POST",
           data:{
               idpoktan:$('#idPoktan').val(),
               perintah:"Cari_Data"
           },
           success:function(respond){
               $hasil=JSON.parse(respond);
               $("#namaPoktan").val($hasil['data'][0]['nama_poktan']);
               $("#telpPoktan").val($hasil['data'][0]['telp']);          
               
           }
       });
 });

//menampilkan data view benih
 $('#table-pupuk').DataTable({
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
          "url": "./app/controller/controllerPupuk.php",
          "type": "POST",
          "data" : {
            perintah : "recordDataPupuk"
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
        { "data": "telp"},
        { "data": "kota" },
        { "data": "jumlah_pupuk" },
        { "data": "jenis_pupuk" },
        { "data": "tgl_bantuan" },
        { "data": null, render : function(data,type,row){
          return "<button title='Edit' class='btn btn-edit-pupuk btn-warning btn-xs'><i class='fafa-pencil'></i>...</button>";
        }     },
        ]
      });


  //Kode Simpan Bantuan Pupuk
     $("#btnSimpan").click(function(){


          $.ajax({
           url:"./app/controller/controllerPupuk.php",
           type:"POST",
           data:{
               idpoktan:$('#idPoktan').val(),
               jumlahBantuan:$('#jumlahBantuan').val(),
               tglBantuan:$('#tglBantuan').val(),
               jenisBantuan:$('#jenisBantuan').val(),
               perintah:"Simpan_Data"
           },
           success:function(respond){
               $hasil=JSON.parse(respond);
               swal($hasil['pesan']);
               var table = $('#table-pupuk').DataTable();
                table.ajax.reload(null,false);
                clearInputan();
           }
       });
     });


     //Menampilkan Data pupuk siap edit
     $(document).on("click",".btn-edit-pupuk",function(){

     	 var posisiBaris = $(this).parents('tr');
          if (posisiBaris .hasClass('child')) 
          {
              posisiBaris = posisiBaris .prev();
          }
          var table = $('#table-pupuk').DataTable();
          var baris = table.row( posisiBaris ).data();
          

     	  $.ajax({
     	  	url:"./app/controller/controllerPupuk.php",
     	  	type:"POST",
     	  	data:{
     	  		id:baris.id,
                perintah:"Cari_Edit"
     	  	},
           success:function(respond){
               $hasil=JSON.parse(respond);
               $("#idBenih").val($hasil['data'][0]['id']);
               $("#idPoktan").val($hasil['data'][0]['idpoktan']);  
               $("#namaPoktan").val($hasil['data'][0]['nama_poktan']);
               $("#telpPoktan").val($hasil['data'][0]['telp']);     
               $("#tglBantuan").val($hasil['data'][0]['tgl_bantuan']);
               $("#jumlahBantuan").val($hasil['data'][0]['jumlah_pupuk']);
               $("#jenisBantuan").val($hasil['data'][0]['jenis_pupuk']);       
               
           }
     	  });
     });


     //Kode Ubah Bantuan Pupuk
     $("#btnUbah").click(function(){


          $.ajax({
           url:"./app/controller/controllerPupuk.php",
           type:"POST",
           data:{
           	   id:$('#idPupuk').val(),
               idpoktan:$('#idPoktan').val(),
               jumlahBantuan:$('#jumlahBantuan').val(),
               tglBantuan:$('#tglBantuan').val(),
               jenisBantuan:$('#jenisBantuan').val(),
               perintah:"Ubah_Data"
           },
           success:function(respond){
               $hasil=JSON.parse(respond);
               swal($hasil['pesan']);
               var table = $('#table-pupuk').DataTable();
                table.ajax.reload(null,false);
                clearInputan();
           }
       });
     });


        //Kode Ubah Bantuan Pupuk
     $("#btnHapus").click(function(){


          $.ajax({
           url:"./app/controller/controllerPupuk.php",
           type:"POST",
           data:{
           	   id:$('#idPupuk').val(),
               perintah:"Hapus_Data"
           },
           success:function(respond){
               $hasil=JSON.parse(respond);
               swal($hasil['pesan']);
               var table = $('#table-pupuk').DataTable();
                table.ajax.reload(null,false);
                clearInputan();
           }
       });
     });


      //Kode Clear Inputan
     $("#btnClear").click(function(){
     	  $("#idBenih").val('');
          $("#idPoktan").val(''); 
          $("#namaPoktan").val('');
          $("#telpPoktan").val('');    
          $("#tglBantuan").val('');
          $("#jumlahBantuan").val('');
          $("#jenisBantuan").val('');   
     });





});