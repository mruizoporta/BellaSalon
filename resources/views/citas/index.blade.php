@extends('layouts.panel')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row align-items-center">
                      <div class="col">                        
                        <h5 class="mb-0">
                            <span class="glyphicon glyphicon-lock"></span> Citas programadas</h5>
                      </div>                      
                    </div>
                  </div>
            </div>
            <div class="card-body">
                @if(session('notification'))
                    <div class="alert alert-success" role="alert">
                      {{session('notification')}}
                    </div>
                @endif
            </div>   
            <div class="table-responsive">
            <div class="calendar-page">
                <div class="calendar-page-content">
                    <div class="calendar-page-title">calendario</div>
                    <div class="calendar-page-content-in">
                        <div id='calendar'></div>
                    </div><!--.calendar-page-content-in-->
                </div><!--.calendar-page-content-->
               
            </div><!--.calendar-page-->
        </div>
        </div>
    </div>
</div>   


<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="myModalLabel">Upload File</h4>
            </div>
            <div class="modal-upload">
                <div class="modal-upload-cont">
                    <div class="modal-upload-cont-in">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tab-upload">
                                <div class="modal-upload-body scrollable-block">
                                    <div class="uploading-container">
                                        <div class="uploading-container-left">
                                            <div class="drop-zone">
                                                <!--
                                                при перетаскиваении добавляем класс .dragover
                                                <div class="drop-zone dragover">
                                                -->
                                                <i class="font-icon font-icon-cloud-upload-2"></i>
                                                <div class="drop-zone-caption">Drag file to upload</div>
                                                <span class="btn btn-rounded btn-file">
                                                    <span>Choose file</span>
                                                    <input type="file" name="files[]" multiple>
                                                </span>
                                            </div>
                                        </div><!--.uploading-container-left-->
                                        <div class="uploading-container-right">
                                            <div class="uploading-container-right-in">
                                                <h6 class="uploading-list-title">Uploading</h6>
                                                <ul class="uploading-list">
                                                    <li class="uploading-list-item">
                                                        <div class="uploading-list-item-wrapper">
                                                            <div class="uploading-list-item-name">
                                                                <i class="font-icon font-icon-cam-photo"></i>
                                                                photo.png
                                                            </div>
                                                            <div class="uploading-list-item-size">7,5 mb</div>
                                                            <button type="button" class="uploading-list-item-close">
                                                                <i class="font-icon-close-2"></i>
                                                            </button>
                                                        </div>
                                                        <progress class="progress" value="25" max="100">
                                                            <div class="progress">
                                                                <span class="progress-bar" style="width: 25%;">25%</span>
                                                            </div>
                                                        </progress>
                                                        <div class="uploading-list-item-progress">37% done</div>
                                                        <div class="uploading-list-item-speed">90KB/sec</div>
                                                    </li>
                                                    <li class="uploading-list-item">
                                                        <div class="uploading-list-item-wrapper">
                                                            <div class="uploading-list-item-name">
                                                                <i class="font-icon font-icon-page"></i>
                                                                task.doc
                                                            </div>
                                                            <div class="uploading-list-item-size">7,5 mb</div>
                                                            <button type="button" class="uploading-list-item-close">
                                                                <i class="font-icon-close-2"></i>
                                                            </button>
                                                        </div>
                                                        <progress class="progress" value="50" max="100">
                                                            <div class="progress">
                                                                <span class="progress-bar" style="width: 50%;">50%</span>
                                                            </div>
                                                        </progress>
                                                        <div class="uploading-list-item-progress">37% done</div>
                                                        <div class="uploading-list-item-speed">90KB/sec</div>
                                                    </li>
                                                    <li class="uploading-list-item">
                                                        <div class="uploading-list-item-wrapper">
                                                            <div class="uploading-list-item-name">
                                                                <i class="font-icon font-icon-cam-photo"></i>
                                                                dashboard.png
                                                            </div>
                                                            <div class="uploading-list-item-size">7,5 mb</div>
                                                            <button type="button" class="uploading-list-item-close">
                                                                <i class="font-icon-close-2"></i>
                                                            </button>
                                                        </div>
                                                        <progress class="progress" value="100" max="100">
                                                            <div class="progress">
                                                                <span class="progress-bar" style="width: 100%;">100%</span>
                                                            </div>
                                                        </progress>
                                                        <div class="uploading-list-item-progress">Completed</div>
                                                        <div class="uploading-list-item-speed">90KB/sec</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!--.uploading-container-right-->
                                    </div><!--.uploading-container-->
                                </div><!--.modal-upload-body-->
                                <div class="modal-upload-bottom">
                                    <button type="button" class="btn btn-rounded btn-default">Cancel</button>
                                    <button type="button" class="btn btn-rounded">Done</button>
                                </div><!--.modal-upload-bottom-->
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane" id="tab-dropbox">
                                <div class="upload-dropbox">
                                    <h3>Upload a file from Dropbox</h3>
                                    <p>
                                        Get files your Dropbox account.<br/>
                                        We play nice. You just need to login.
                                    </p>
                                    <button type="button" class="btn btn-rounded">Connect to Dropbox</button>
                                    <div class="text-muted">We will open a new page to connect your Dropbox account.</div>
                                </div>
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane" id="tab-google-drive">
                                <div class="modal-upload-body scrollable-block">
                                    <div class="upload-gd-header">
                                        <div class="tbl-row">
                                            <div class="tbl-cell">
                                                <input type="text" class="form-control form-control-rounded" placeholder="Search"/>
                                            </div>
                                            <div class="tbl-cell tbl-cell-btns">
                                                <button type="button">
                                                    <i class="font-icon font-icon-cam-photo"></i>
                                                </button>
                                                <button type="button">
                                                    <i class="font-icon font-icon-cam-video"></i>
                                                </button>
                                                <button type="button">
                                                    <i class="font-icon font-icon-sound"></i>
                                                </button>
                                                <button type="button">
                                                    <i class="font-icon font-icon-page"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gd-doc-grid">
                                        <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-upload-bottom">
                                    <button type="button" class="btn btn-rounded">Select</button>
                                    <button type="button" class="btn btn-rounded btn-default">Cancel</button>
                                </div>
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane" id="tab-yandex-disk">
                                Yandex Disk
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane" id="tab-box">
                                Box
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane" id="tab-one-drive">
                                One drive
                            </div><!--.tab-pane-->
                        </div><!--.tab-content-->
                    </div><!--.modal-upload-cont-in-->
                </div><!--.modal-upload-cont-->
                <div class="modal-upload-side">
                    <ul class="upload-list" role="tablist">
                        <li class="nav-item">
                            <a href="#tab-upload" role="tab" data-toggle="tab" class="active">
                                <i class="font-icon font-icon-cloud-upload-2"></i>
                                <span>Upload</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-dropbox" role="tab" data-toggle="tab">
                                <i class="font-icon font-icon-dropbox"></i>
                                <span>Dropbox</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-google-drive" role="tab" data-toggle="tab">
                                <i class="font-icon font-icon-google-drive"></i>
                                <span>Google Drive</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-yandex-disk" role="tab" data-toggle="tab">
                                <i class="font-icon font-icon-yandex-disk"></i>
                                <span>Yandex Disk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-box" role="tab" data-toggle="tab">
                                <i class="font-icon font-icon-box"></i>
                                <span>Box</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-one-drive" role="tab" data-toggle="tab">
                                <i class="font-icon font-icon-one-drive"></i>
                                <span>One Drive</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--.modal-->

<div class="modal fade" id="upload2Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="myModalLabel">Upload File</h4>
            </div>
            <div class="modal-upload menu-bottom">
                <div class="modal-upload-cont">
                    <div class="modal-upload-cont-in">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tab-upload-2">
                                <div class="modal-upload-body scrollable-block">
                                    <div class="uploading-container">
                                        <div class="uploading-container-left">
                                            <div class="drop-zone">
                                                <!--
                                                при перетаскиваении добавляем класс .dragover
                                                <div class="drop-zone dragover">
                                                -->
                                                <i class="font-icon font-icon-cloud-upload-2"></i>
                                                <div class="drop-zone-caption">Drag file to upload</div>
                                                <span class="btn btn-rounded btn-file">
                                                    <span>Choose file</span>
                                                    <input type="file" name="files[]" multiple>
                                                </span>
                                            </div>
                                        </div><!--.uploading-container-left-->
                                        <div class="uploading-container-right">
                                            <div class="uploading-container-right-in">
                                                <h6 class="uploading-list-title">Uploading</h6>
                                                <ul class="uploading-list">
                                                    <li class="uploading-list-item">
                                                        <div class="uploading-list-item-wrapper">
                                                            <div class="uploading-list-item-name">
                                                                <i class="font-icon font-icon-cam-photo"></i>
                                                                photo.png
                                                            </div>
                                                            <div class="uploading-list-item-size">7,5 mb</div>
                                                            <button type="button" class="uploading-list-item-close">
                                                                <i class="font-icon-close-2"></i>
                                                            </button>
                                                        </div>
                                                        <progress class="progress" value="25" max="100">
                                                            <div class="progress">
                                                                <span class="progress-bar" style="width: 25%;">25%</span>
                                                            </div>
                                                        </progress>
                                                        <div class="uploading-list-item-progress">37% done</div>
                                                        <div class="uploading-list-item-speed">90KB/sec</div>
                                                    </li>
                                                    <li class="uploading-list-item">
                                                        <div class="uploading-list-item-wrapper">
                                                            <div class="uploading-list-item-name">
                                                                <i class="font-icon font-icon-page"></i>
                                                                task.doc
                                                            </div>
                                                            <div class="uploading-list-item-size">7,5 mb</div>
                                                            <button type="button" class="uploading-list-item-close">
                                                                <i class="font-icon-close-2"></i>
                                                            </button>
                                                        </div>
                                                        <progress class="progress" value="50" max="100">
                                                            <div class="progress">
                                                                <span class="progress-bar" style="width: 50%;">50%</span>
                                                            </div>
                                                        </progress>
                                                        <div class="uploading-list-item-progress">37% done</div>
                                                        <div class="uploading-list-item-speed">90KB/sec</div>
                                                    </li>
                                                    <li class="uploading-list-item">
                                                        <div class="uploading-list-item-wrapper">
                                                            <div class="uploading-list-item-name">
                                                                <i class="font-icon font-icon-cam-photo"></i>
                                                                dashboard.png
                                                            </div>
                                                            <div class="uploading-list-item-size">7,5 mb</div>
                                                            <button type="button" class="uploading-list-item-close">
                                                                <i class="font-icon-close-2"></i>
                                                            </button>
                                                        </div>
                                                        <progress class="progress" value="100" max="100">
                                                            <div class="progress">
                                                                <span class="progress-bar" style="width: 100%;">100%</span>
                                                            </div>
                                                        </progress>
                                                        <div class="uploading-list-item-progress">Completed</div>
                                                        <div class="uploading-list-item-speed">90KB/sec</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!--.uploading-container-right-->
                                    </div><!--.uploading-container-->
                                </div><!--.modal-upload-body-->
                                <div class="modal-upload-bottom">
                                    <button type="button" class="btn btn-rounded btn-default">Cancel</button>
                                    <button type="button" class="btn btn-rounded">Done</button>
                                </div><!--.modal-upload-bottom-->
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane" id="tab-dropbox-2">
                                <div class="upload-dropbox">
                                    <h3>Upload a file from Dropbox</h3>
                                    <p>
                                        Get files your Dropbox account.<br/>
                                        We play nice. You just need to login.
                                    </p>
                                    <button type="button" class="btn btn-rounded">Connect to Dropbox</button>
                                    <div class="text-muted">We will open a new page to connect your Dropbox account.</div>
                                </div>
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane" id="tab-google-drive-2">
                                <div class="modal-upload-body scrollable-block">
                                    <div class="upload-gd-header">
                                        <div class="tbl-row">
                                            <div class="tbl-cell">
                                                <input type="text" class="form-control form-control-rounded" placeholder="Search"/>
                                            </div>
                                            <div class="tbl-cell tbl-cell-btns">
                                                <button type="button">
                                                    <i class="font-icon font-icon-cam-photo"></i>
                                                </button>
                                                <button type="button">
                                                    <i class="font-icon font-icon-cam-video"></i>
                                                </button>
                                                <button type="button">
                                                    <i class="font-icon font-icon-sound"></i>
                                                </button>
                                                <button type="button">
                                                    <i class="font-icon font-icon-page"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gd-doc-grid">
                                        <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                         <div class="gd-doc-col">
                                            <div class="gd-doc">
                                                <div class="gd-doc-preview">
                                                    <a href="#">
                                                        <img src="img/doc.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="gd-doc-title">History Class Final</div>
                                                <div class="gd-doc-date">05/30/2014</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-upload-bottom">
                                    <button type="button" class="btn btn-rounded">Select</button>
                                    <button type="button" class="btn btn-rounded btn-default">Cancel</button>
                                </div>
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane" id="tab-yandex-disk-2">
                                Yandex Disk
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane" id="tab-box-2">
                                Box
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane" id="tab-one-drive-2">
                                One drive
                            </div><!--.tab-pane-->
                        </div><!--.tab-content-->
                    </div><!--.modal-upload-cont-in-->
                </div><!--.modal-upload-cont-->
                <div class="modal-upload-side">
                    <ul class="upload-list" role="tablist">
                        <li class="nav-item">
                            <a href="#tab-upload-2" role="tab" data-toggle="tab" class="active">
                                <i class="font-icon font-icon-cloud-upload-2"></i>
                                <span>Upload</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-dropbox-2" role="tab" data-toggle="tab">
                                <i class="font-icon font-icon-dropbox"></i>
                                <span>Dropbox</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-google-drive-2" role="tab" data-toggle="tab">
                                <i class="font-icon font-icon-google-drive"></i>
                                <span>Google Drive</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-yandex-disk-2" role="tab" data-toggle="tab">
                                <i class="font-icon font-icon-yandex-disk"></i>
                                <span>Yandex Disk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-box-2" role="tab" data-toggle="tab">
                                <i class="font-icon font-icon-box"></i>
                                <span>Box</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-one-drive-2" role="tab" data-toggle="tab">
                                <i class="font-icon font-icon-one-drive"></i>
                                <span>One Drive</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--.modal-->

@push('scrips')
    <script src="{{ asset('js/lib/jquery/jquery.min.js')}}"></script>
	<script src="{{ asset('js/lib/tether/tether.min.js')}}"></script>
	<script src="{{ asset('js/lib/bootstrap/bootstrap.min.js')}}"></script>
	<script src="{{ asset('js/plugins.js')}}"></script>

    <script type="text/javascript" src="{{ asset('js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/lib/moment/moment-with-locales.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/lib/eonasdan-bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
	
    <script src="{{ asset('js/lib/fullcalendar/fullcalendar.min.js')}}"></script>
	<script src="{{ asset('js/lib/fullcalendar/fullcalendar-init.js')}}"></script>

@endpush

@endsection