<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-body">
            <h5><i class='fa fa-cube fa-fw'></i> Barang <i class='fa fa-angle-right fa-fw'></i> Semua Barang
            <a href='#formDialog' data-toggle='modal' onClick='formDialog(0)' class='btn btn-success btn-sm pull-right panel-title-button'><i class='fa fa-plus fa-fw'></i> Tambah Barang</a></h5>
            <hr />

            <div class='table-responsive'>
                <table id="my-grid" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Merk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Kondisi Sekarang</th>
                        <th>Keterangan</th>
                        <th style="width: 10%" class="no-sort text-center"><i class='fa fa-cog fa-fw'></i></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="formDialog" role="dialog">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Barang</h4>
            </div>
            <div class="modal-status"></div>
            <div class="modal-body">
                <input type="hidden" name="barang_id" id="barang_id">

                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jenis Barang / Nama Barang <span style="color: red">*</span> :</label>
                            <input  class="form-control" placeholder="Masukkan Nama Barang" id="barang_nama" name="barang_nama" maxlength="30" minlength="3" value="" />
                        </div>
                        <div class="form-group">
                            <label>Nomor Kode<span style="color: red">*</span> :</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="barang_nomor_kode" id="barang_nomor_kode" placeholder="Masukan Nomor Kode" value="" />
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomor Registrasi <span style="color: red">*</span> :</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="barang_nomor_register" id="barang_nomor_register" placeholder="Masukan Nomor Registrasi" value="" />
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomor Seri Pabrik <span style="color: red">*</span> :</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="barang_nomor_seripabrik" id="barang_nomor_seripabrik" placeholder="Masukan Nomor Seri Pabrik" value="" />
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Merk/Type/Judul/Pencipta <span style="color: red">*</span> :</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="barang_merk" id="barang_merk" placeholder="Masukan Merk" value="" />
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label>Bahan <span style="color: red">*</span> :</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="barang_bahan" id="barang_bahan" placeholder="Masukan Bahan" value="" />
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="col-sm-6">



                        <div class="form-group">
                            <label>Ukuran <span style="color: red">*</span> :</label>
                            <input  class="form-control" placeholder="Masukkan Ukuran" id="barang_ukuran" name="barang_ukuran" value="0" type="number" />
                        </div>

                        <div class="form-group">
                            <label>Tahun Pembuatan/Pembelian <span style="color: red">*</span> :</label>
                            <input  class="form-control" placeholder="Masukkan Tahun" id="barang_tahun_pembelian" name="barang_tahun_pembelian" value="0" type="number" />
                        </div>

                        <div class="form-group">
                            <label>Harga <span style="color: red">*</span> (Rp):</label>
                            <input  class="form-control" placeholder="Masukkan Harga" id="barang_harga" name="barang_harga" value="0" type="number" />
                        </div>

                        <div class="form-group">
                            <label>Kondisi <span style="color: red">*</span> :</label>
                            <select  class="form-control" name="barang_kondisi" id="barang_kondisi">
                                <option value="Baik">Baik</option>
                                <option value="Rusak ringan">Rusak ringan</option>
                                <option value="Rusak berat">Rusak berat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kondisi saat ini<span style="color: red">*</span> :</label>
                            <select  class="form-control" name="barang_kondisi_saatini" id="barang_kondisi_saatini">
                                <option value="Baik">Baik</option>
                                <option value="Rusak ringan">Rusak ringan</option>
                                <option value="Rusak berat">Rusak berat</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Keterangan <span style="color: red">*</span> :</label>
                            <input  class="form-control" placeholder="Masukkan Keterangan" id="barang_keterangan" name="barang_keterangan" type="text" />
                        </div>



                    </div>

                    <div class="clearfix"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button onclick="submitTambah()" type="button" id="btn-tambah" class="btn btn-primary">Tambah</button>
                <button onclick="submitEdit()" type="button" id="btn-ubah" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" language="javascript" >
    $(document).ready(function() {
        var dataTable = $('#my-grid').DataTable( {
            "serverSide": true,
            "stateSave" : false,
            "bAutoWidth": true,
            "oLanguage": {
                "sSearch": "<i class='fa fa-search fa-fw'></i> Pencarian : ",
                "sLengthMenu": "_MENU_ &nbsp;&nbsp;Data Per Halaman <?php //echo $tambahan; ?>",
                "sInfo": "Menampilkan _START_ s/d _END_ dari <b>_TOTAL_ data</b>",
                "sInfoFiltered": "(difilter dari _MAX_ total data)",
                "sZeroRecords": "Pencarian tidak ditemukan",
                "sEmptyTable": "Data kosong",
                "sLoadingRecords": "Harap Tunggu...",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
            "aaSorting": [[ 0, "desc" ]],
            "columnDefs": [
                {
                    "targets": 'no-sort',
                    "orderable": false,
                }
            ],
            "sPaginationType": "simple_numbers",
            "iDisplayLength": 10,
            "aLengthMenu": [[10, 20, 50, 100, 150], [10, 20, 50, 100, 150]],
            "ajax":{
                url :"<?php echo site_url('admin/barang/data'); ?>",
                type: "post",
                error: function(){
                    $(".my-grid-error").html("");
                    $("#my-grid").append('<tbody class="my-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#my-grid_processing").css("display","none");
                }
            }
        } );

        $( "#barang_kategori" ).autocomplete({
            source: "<?php echo site_url('admin/barang/data1/?');?>"
        });
        $( "#barang_merek" ).autocomplete({
            source: "<?php echo site_url('admin/barang/data2/?');?>"
        });
        $( "#barang_kode" ).autocomplete({
            source: "<?php echo site_url('admin/barang/data3/?');?>"
        });
    });

    function formDialog(id) {
        $('#btn-tambah').show();
        $('#btn-ubah').hide();
        if(id > 0){
            $('#btn-tambah').hide();
            $('#btn-ubah').show();
        }

    }


    function submitTambah(){
        var FormData = "barang_id="+$('#barang_id').val();
        FormData += "&barang_nama="+$('#barang_nama').val();
        FormData += "&barang_nomor_kode="+$('#barang_nomor_kode').val();
        FormData += "&barang_nomor_register="+$('#barang_nomor_register').val();
        FormData += "&barang_nomor_seripabrik="+$('#barang_nomor_seripabrik').val();
        FormData += "&barang_merk="+$('#barang_merk').val();
        FormData += "&barang_ukuran="+$('#barang_ukuran').val();
        FormData += "&barang_bahan="+$('#barang_bahan').val();
        FormData += "&barang_tahun_pembelian="+$('#barang_tahun_pembelian').val();
        FormData += "&barang_kondisi="+$('#barang_kondisi').val();
        FormData += "&barang_harga="+$('#barang_harga').val();
        FormData += "&barang_keterangan="+$('#barang_keterangan').val();
        FormData += "&barang_kondisi_saatini="+$('#barang_kondisi_saatini').val();

        $.ajax({
            url: "<?php echo site_url('admin/barang/simpan'); ?>",
            type: "POST",
            cache: false,
            data: FormData,
            dataType:'json',
            success: function(data){
                if(data.status == 1)
                {
                    alert(data.pesan);
                    window.location.href="<?php echo site_url('admin/barang'); ?>";
                }
                else
                {
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('#ModalHeader').html('Oops !');
                    $('#ModalContent').html(data.pesan);
                    $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
                    $('#ModalGue').modal('show');
                }
            }
        });
    }


    function submitEdit(id) {

    }

    function submitHapus(id) {

    }
</script>