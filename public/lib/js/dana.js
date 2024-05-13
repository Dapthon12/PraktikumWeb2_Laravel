$(document).ready(function(){

 //mencari data poktan berdasarkan ID
 $("#idPoktan").keyup(function(){
    $.ajax({
           url:"./app/controller/controllerDana.php",
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
 $('#table-dana').DataTable({
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
          "url": "./app/controller/controllerDana.php",
          "type": "POST",
          "data" : {
            perintah : "recordDataDana"
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
        { "data": "jumlah_dana" },
        { "data": "tgl" },
        { "data": null, render : function(data,type,row){
          return "<button title='Edit' class='btn btn-edit-dana btn-warning btn-xs'><i class='fafa-pencil'></i>...</button>";
        }     },
        ]
      });


  //Kode Simpan Bantuan Pupuk
     $("#btnSimpan").click(function(){


          $.ajax({
           url:"./app/controller/controllerDana.php",
           type:"POST",
           data:{
               idpoktan:$('#idPoktan').val(),
               jumlahBantuan:$('#jumlahBantuan').val(),
               tglBantuan:$('#tglBantuan').val(),
               perintah:"Simpan_Data"
           },
           success:function(respond){
               $hasil=JSON.parse(respond);
               swal($hasil['pesan']);
               var table = $('#table-dana').DataTable();
                table.ajax.reload(null,false);
                
           }
       });
     });


     //Menampilkan Data pupuk siap edit
     $(document).on("click",".btn-edit-dana",function(){

     	 var posisiBaris = $(this).parents('tr');
          if (posisiBaris .hasClass('child')) 
          {
              posisiBaris = posisiBaris .prev();
          }
          var table = $('#table-dana').DataTable();
          var baris = table.row( posisiBaris ).data();
          

     	  $.ajax({
     	  	url:"./app/controller/controllerDana.php",
     	  	type:"POST",
     	  	data:{
     	  		id:baris.iddana,
                perintah:"Cari_Edit"
     	  	},
           success:function(respond){
               $hasil=JSON.parse(respond);
               $("#idDana").val($hasil['data'][0]['iddana']);
               $("#idPoktan").val($hasil['data'][0]['idpoktan']);  
               $("#namaPoktan").val($hasil['data'][0]['nama_poktan']);
               $("#telpPoktan").val($hasil['data'][0]['telp']);     
               $("#tglBantuan").val($hasil['data'][0]['tgl']);
               $("#jumlahBantuan").val($hasil['data'][0]['jumlah_dana']);   
               
           }
     	  });
     });


     //Kode Ubah Bantuan Pupuk
     $("#btnUbah").click(function(){


          $.ajax({
           url:"./app/controller/controllerDana.php",
           type:"POST",
           data:{
           	   id:$('#idDana').val(),
               idpoktan:$('#idPoktan').val(),
               jumlahBantuan:$('#jumlahBantuan').val(),
               tglBantuan:$('#tglBantuan').val(),
               perintah:"Ubah_Data"
           },
           success:function(respond){
               $hasil=JSON.parse(respond);
               swal($hasil['pesan']);
               var table = $('#table-dana').DataTable();
                table.ajax.reload(null,false);
               
           }
       });
     });


        //Kode Ubah Bantuan Pupuk
     $("#btnHapus").click(function(){


          $.ajax({
           url:"./app/controller/controllerDana.php",
           type:"POST",
           data:{
           	   id:$('#idDana').val(),
               perintah:"Hapus_Data"
           },
           success:function(respond){
               $hasil=JSON.parse(respond);
               swal($hasil['pesan']);
               var table = $('#table-dana').DataTable();
                table.ajax.reload(null,false);
             
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