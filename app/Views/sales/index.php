<div class="full1">
    <div class="text-dark p-1 text-center shadow-lg fontbg">
        <div class="title1">
        <h1 >Sales <i class="fa-solid fa-store"></i> </h1>
    </div>
    <?= current_user() == NULL ? "-" : current_user()['name'] ?>
    </div>
    
</br>

<?php foreach (session()->getFlashdata() as $key => $flash) :?>
        <div class="alert alert-<?= $key ?>" role="alert">
        <?= $flash ?>
    </div>
    <?php endforeach; ?>
    
        <div class="float-md-none">
      <div class="container pt-2">
    <button class="btn btn-dark mb-3"><a href="sales/new" style="text-decoration: none; color: white">Add Sales <i class="fa-solid fa-store"></i></a></button>
    <div class="col-12 col-xl-10 col-lg-6 float-end">
            <form action="/sales" method="get" class="mb-2" id="form-search">
                <div class="input-group">
                    <span class="input-group-text fw-bold text-light"  style="background-color: #1a374d">Cari Sales</span>
                    <input type="text" name="search" id="search" placeholder="Masukkan nama barang" class="form-control shadow-lg" >
                    <input type="submit" value="Cari" class="btn btn-primary text-dark" style="background-color: #6998ab">
                </div>
            </form>
        </div>
    </div>
    </div>
    <br>


    <div id="table-result">
            <?= view('sales/_sales', ['sales' => $sales]) ?>
        </div>
            </div>
    </div>


<div class="modal fade" tabindex="-1" id="modal-show-item">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Loading..</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Loading..
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
      $(function() {
                $('.btnHapus').on("click", function(event){
                    if(!confirm("Yakin ingin menghapus data ini ?")) {
                        event.preventDefault()
                    }
                }) 

                $('.form-delete').on("submit", function(event){
                    event.preventDefault()

                    var form = $(this)
                    var actionUrl = form.attr('action');
                    $.ajax({
                        type: 'post',
                        url: actionUrl,
                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                        data: form.serialize(),
                        dataType: 'json',
                        success: function(data) {
                            if(data.status == 200) {
                                $("#sale_" + data.id).remove()
                            } else {
                                alert(data.message)
                            }
                        },
                        error: function() {
                            alert("Gagal menghapus data")
                        },
                    })
                })

                $('#form-search').on("submit", function(event){
                    event.preventDefault();

                    var form = $(this)
                    var actionUrl = form.attr('action');
                    $.ajax({
                        type: 'get',
                        url: actionUrl,
                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                        data: form.serialize(),
                        dataType: 'html',
                        success: function(data){
                            $("#table-result").html(data)
                        },
                        error: function(){
                            alert("Gagal mencari data")
                        }
                    })
                })

                $('.btn-lihat').on("click", function(event) {
                    event.preventDefault()

                    var url = $(this).attr('href')
                    $("#modal-show-item .modal-title").html("Loading..")
                    $("#modal-show-item .modal-body").html('Loading...')
                    $("#modal-show-item").modal('show')
                    $.ajax({
                        type: 'get',
                        url: url,
                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                        dataType: 'html',
                        success: function(data){
                            $("#modal-show-item .modal-title").html("Rincian Barang")
                            $("#modal-show-item .modal-body").html(data)
                        },
                        error: function(){
                            alert("Gagal mengambil data")
                        },
                    })
                })

                $("#search").on("keyup", function(){
                    var text_search = $(this).val()
                    if(text_search.length >= 3 || text_search.length == 0){
                        $("#form-search").trigger("submit")
                    }
                })
            })
</script>