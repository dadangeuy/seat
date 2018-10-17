<div id="detail" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail</h4>
                </div>
                <div class="modal-body" >
                    <div class="row" >
                        <div class="col-md-10 col-md-offset-1">
                            <div id="list-slider" >
                                <div style="text-align: center">
                                    <img id="image1" style="max-width: 250px;max-height: 250px;margin: 0 auto;">
                                </div>
                                <div style="text-align: center">
                                    <img id="image2" style="max-width: 250px;max-height: 250px;margin: 0 auto;">
                                </div>
                                <div style="text-align: center">
                                    <img id="image3" style="max-width: 250px;max-height: 250px;margin: 0 auto;">
                                </div>
                                <div style="text-align: center">
                                    <img id="image4" style="max-width: 250px;max-height: 250px;margin: 0 auto;">
                                </div>
                                <div style="text-align: center">
                                    <img id="image5" style="max-width: 250px;max-height: 250px;margin: 0 auto;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            <p id="deskripsi"></p>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div id="booking" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" class="form-horizontal form-group-bordered" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Booking</h4>
                </div>
                <div class="modal-body" >
                    <div class="row" >
                        {{ csrf_field() }}
                        <div class="col-md-8">
                                <div class="form-group">
                                    <label for="tanggal" class="col-md-5 control-label">Tanggal</label>
                                    <div class="col-md-7">
                                        <input id="tanggal" type="date" class="form-control" name="tanggal" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dari" class="col-md-5 control-label">Dari Jam</label>
                                    <div class="col-md-7">
                                        <input id="dari" type="time" class="form-control" name="dari" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="hingga" class="col-md-5 control-label">Hingga Jam</label>
                                    <div class="col-md-7">
                                        <input id="hingga" type="time" class="form-control" name="hingga" required>
                                    </div>
                                </div>
                                <div id="list_kursi">
                                    <div class="form-group">
                                        <label for="booking_seat_name1" class="col-md-5 control-label">Nama Tempat Duduk 1</label>
                                        <div class="col-md-7">
                                            <select id="booking_seat_name1" class="form-control" name="booking_seat_name1"></select>
                                        </div>
                                    </div>
                                </div>  
                                <div class="form-group" style="text-align: right;">
                                    <a href="#" onclick="tambah_kursi()" class="btn btn-blue">Tambah Tempat Duduk</a>
                                </div>
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <div class="col-md-12">
                                <img id="denah" style="max-width: 150px;max-height: 150px">
                                </div>
                            <div class="col-md-12"> 
                                <a href="#" id="denah_lihat" class="btn btn-blue" target="_blank"><i class="entypo entypo-search"></i>Lihat</a>
                            </div>
                           
                        </div>
                        
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-green">Booking</button>
                </div>
                </form>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        var jumlah_kursi=1;
        var bookingClone = $("#booking").clone();
        function gantigambar() {
            $('#gambarku').css({
                'display': 'none'
            });
            $('#fileinput').css({
                'display': 'inline-block'
            });
        }
        function hapusData(route){
            swal({
                title: "Apa anda yakin menghapus data ini?",
                text: "Data yang dihapus tidak bisa dikembalikan lagi!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                window.location.href = route;
                } 
            });
        }
        function detail(url, directory)
        {
            $.get(url, function (data) {
                $('#image1').attr('src',directory+'/'+data.image1);
                $('#image2').attr('src',directory+'/'+data.image2);
                $('#image3').attr('src',directory+'/'+data.image3);
                $('#image4').attr('src',directory+'/'+data.image4);
                $('#image5').attr('src',directory+'/'+data.image5);
                $('#deskripsi').html(data.deskripsi);
                $('#detail').modal('show');
            }) 
        }
        function booking(url_restoran,url_kursi, directory)
        {
            $('#booking').replaceWith(bookingClone.clone());
            jumlah_kursi = 1;
            $.get(url_restoran, function (data) {
                $('#denah').attr('src',directory+'/'+data.denah);
                var print ="";
                $('#denah').attr('src',directory+'/'+data.denah);
                $('#denah_lihat').attr('href',directory+'/'+data.denah);

                $.get(url_kursi , function (data2) {
                    for (var i=0;i< data2.length;i++) { 
                        print = print + '<option value="'+data2[i].id+'">'+data2[i].name+' ('+data2[i].kapasitas+' orang)</option>'
                    }
                    $('#booking_seat_name1').html(print);
                    $('#booking').modal('show');
                });
                
            }) 
        }
        function tambah_kursi()
        {
            jumlah_kursi++;
            var print='<div class="form-group"><label for="booking_seat_name'+jumlah_kursi+'" class="col-md-5 control-label">Nama Tempat Duduk '+jumlah_kursi+'</label><div class="col-md-7"><select id="booking_seat_name'+jumlah_kursi+'" class="form-control" name="booking_seat_name'+jumlah_kursi+'"></select></div></div>'
            $('#list_kursi').append(print);
            $('#booking_seat_name'+jumlah_kursi).html($('#booking_seat_name1').html());
        }
    </script>