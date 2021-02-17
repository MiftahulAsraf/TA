@extends('layouts.master')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Konsultasi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                @if(auth()->user()->id_role == '3')
                <div class="card-header">
                    <h3 class="card-title">List dokter</h3>
                </div>
                @elseif(auth()->user()->id_role == '2')
                <div class="card-header">
                    <h3 class="card-title">List pasien masuk</h3>
                </div>                
                @endif
                <div class="card-body">
                    @if(auth()->user()->id_role == '3')
                    
                    <div class="row">
                        @foreach($dokters as $dokter)
                            <div class="col-md-6">
                                <div class="card card-widget widget-user-2">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header">
                                    <div class="widget-user-image" >
                                        <img class="img-circle elevation-2 " src="{{$dokter->getfoto()}}" alt="User Avatar" style="width:70px; height:70px">
                                    </div>
                                    <div class="ml-4">
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">{{ $dokter->nama_user }}</h3>
                                    <h5 class="widget-user-desc">Dokter Umum</h5>
                                    <h5 class="widget-user-desc">10:00 - 21:00</h5>
                                    <h5 class="widget-user-desc">
                                    @if(Cache::has('user-is-online-' . $dokter->id_dokter))
                                        <span class="text-success">Online</span>
                                    @else
                                        <span class="text-secondary">Offline</span>
                                    @endif
                                    </h5>
                                </div>
                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <!-- <a href="#" class="nav-link">
                                            Projects <span class="float-right badge bg-primary">31</span>
                                            </a> -->
                                            <button class="btn btn-block btn-primary btn-flat chat-button-pasien" data-id_dokter="{{ $dokter->id_users }}" data-nama_dokter="{{ $dokter->nama_user }}">Chat</button>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>
                        @endforeach
                    </div>
                    @elseif(auth()->user()->id_role == '2')
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td hidden>Foto</td>
                                <td>Nama pasien</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pasiens as $pasien)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td hidden><img class="img-circle elevation-2 "  src="{{$pasien->getfoto()}}" alt="User Avatar" style="width:70px; height:70px"></td >
                               
                                <td>{{ $pasien->nama_user }}</td>
                                <td>
                                    @if(Cache::has('user-is-online-' . $pasien->id_users))
                                        <span class="text-success">Online</span>
                                    @else
                                        <span class="text-secondary">Offline</span>
                                    @endif
                                </td>
                                <td>
                                <button type="button" class="btn btn-info chat-button-dokter" data-id_pasien="{{ $pasien->id_users }}" data-nama_pasien="{{ $pasien->nama_user }}">Chat</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-success chat-history" style="display: none;" id="chat-history">
                <div class="card-header">
                    <h3 class="card-title" id="titleChat">Riwayat chat</h3>
                </div>
                <form class="send-chat-form">
                    @csrf
                    <div class="card-body">
                        <div id="" class="user_dialog" title="">
                            <div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history direct-chat-primary" id="chat_history">

                                <!-- <div class="direct-chat-msg">
                                        <div class="direct-chat-text float-left">
                                        Is this template really for free? That's unbelievable!
                                        </div>
                                    </div>

                                
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-text float-right">
                                    You better believe it!
                                    </div>
                                </div> -->

                            </div>
                            <div class="form-group">
                                <textarea name="message" id="" class="form-control chat-area"></textarea>
                            </div>
                        </div>
                        <div class="form-group" align="right">
                            <button type="button" name="send_chat" id="'+to_user_id+'"
                                class="btn btn-info send_chat">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('mscript')
<script>
    $(document).ready(() => {
        var receiverId = '';
        var scrolled = false;

        $("#chat_history").on('scroll', function(){
            scrolled=true;
        });

        $(document).on("click",".chat-button-pasien",function(){
            var d = new Date();
            var currentHour = d.getHours();
            // console.log(currentHour);
            currentHour = 12;
            if (currentHour > 10 && currentHour <= 21) {
                if(!$('#chat-history').is(':visible')){
                    receiverId = $(this).data("id_dokter");
                    $("#titleChat").html('Riwayat Chat '+$(this).data("nama_dokter"));
                    $(".chat-history").fadeIn("slow"); 
                    //reload
                }else{
                    if(receiverId==$(this).data("id_dokter")){
                        receiverId = '';
                        $(".chat_history").html('');
                        $(".chat-history").fadeOut("slow");
                    }else{
                        $("#titleChat").html('Riwayat Chat '+$(this).data("nama_dokter"));
                        receiverId = $(this).data("id_dokter");
                        //reload
                    }
                }
                scrolled = false;
            }else{
                alert('Konsultasi Dapat dilakukan dati pukul 10:00 wib sampai 21:00 wib');
            }
        })

        $(document).on("click", ".chat-button-dokter", function(){
            if(!$('#chat-history').is(':visible')){
                receiverId = $(this).data("id_pasien");
                $("#titleChat").html('Riwayat Chat '+$(this).data("nama_pasien"));
                $(".chat-history").fadeIn("slow"); 
                //reload
            }else{
                if(receiverId==$(this).data("id_pasien")){
                    receiverId = '';
                    $(".chat_history").html('');
                    $(".chat-history").fadeOut("slow");
                }else{
                    $("#titleChat").html('Riwayat Chat '+$(this).data("nama_pasien"));
                    receiverId = $(this).data("id_pasien");
                    //reload
                }
            }
            scrolled = false; 
            
        })
        

        function reload_data()
        {
            if(receiverId!=''){
                $.ajax({
                    url: "/konsultasi/chat-history",
                    type: "GET",
                    dataType: 'json',
                    data:{receiver: receiverId},
                    success: function(data){
                        console.log(data);
                        var mElement = "";
                        $(".chat_history").html(mElement);
                        $.each(data.chat,(index,element)=>{
                            //penerima
                            if(element.to_where == receiverId)
                            {
                                mElement = `
                                    <div class="direct-chat-msg right">
                                        
                                       
                                        <div class="direct-chat-text float-right">
                                            `+element.chat+`
                                        </div>
                                    </div> 
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-timestamp float-right"></span>
                                        </div>
                                `;
                            }
                            //pengirim
                            else
                            {
                                mElement = `
                                <div class="direct-chat-msg">

                         
    
                                    <div class="direct-chat-text float-left">
                                        `+element.chat+`
                                    </div>
                            
                                </div>
                                <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-timestamp float-left"></span>
                                </div>
                                `;
                            }

                            $(".chat_history").append(mElement);
                            if(!scrolled){
                                var chat_history = document.getElementById("chat_history");
                                chat_history.scrollTop = chat_history.scrollHeight;
                            }
                        });
                    },
                    error: function(err){
                        console.log(err);
                    }
                });
            }
        }

        $(document).on("click", ".send_chat", () => {
            if($(".chat-area").val()!=""){
                $.ajax({
                    url: "/konsultasi/send-chat/"+receiverId,
                    dataType: 'json',
                    type: 'POST',
                    data: $(".send-chat-form").serialize(),
                    success: function (res) {
                        scrolled = false;
                        $(".chat-area").val("");
                    },
                    error: function () {

                    }
                })
            }
            
        })

        setInterval(reload_data, 1000);
    })

</script>
@endsection
