<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        @if(isset($page_title))
            {{$page_title}}
        @endif
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Css-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/masters/css/main.css')}}">
    <!-- online +Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="{{URL::asset('public/masters/js/jquery-3.2.1.min.js')}}"></script>
    <!--Js-->
    
    
</head>

<body class="app sidebar-mini rtl">
    @include('publisher.layout.header')
    @yield('content')
    
    <!-- Essential javascripts for application to work-->
    <script src="{{URL::asset('public/masters/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{URL::asset('public/masters/js/popper.min.js')}}"></script>
    <script src="{{URL::asset('public/masters/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('public/masters/js/main.js')}}"></script> 
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{URL::asset('public/masters/js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{URL::asset('public/masters/js/plugins/chart.js')}}"></script>
    
    <script type="text/javascript" src="{{URL::asset('public/masters/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/masters/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/masters/js/plugins/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/masters/js/plugins/bootstrap-datepicker.min.js')}}"></script>
    
    <script src="https://www.astuteanalytica.com/public/js/ckeditor.js"></script>
    <script src="https://www.astuteanalytica.com/ckfinder/ckfinder.js"></script>
    
     
    
    <!--CkEditores-->
    <!--<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
        CKEDITOR.replace( 'summary-ckeditor1' );
        CKEDITOR.replace( 'summary-ckeditor2' );
        CKEDITOR.replace( 'summary-ckeditor3' );
    </script>-->
    
    
    
    
    <script>

    ClassicEditor
        .create( document.querySelector( '#editor1' ), { 
		ckfinder: {
			uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
		},
            plugins: [ 'Autoformat','BlockQuote','Bold','CKFinder','CKFinderUploadAdapter','Essentials','Heading','Image','ImageCaption','ImageStyle','ImageToolbar','ImageUpload','Indent','Italic','Link','List','MediaEmbed','Paragraph','PasteFromOffice','Table','TableToolbar','TextTransformation' ], 
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'NumberedList', 'BulletedList', 'blockQuote', 'Outdent', 'Indent', 'custombutton', 'ckfinder', 'insertTable', 'undo', 'redo', '|', 'code'],
			  link: {
            decorators: {
                openInNewTab: {
                    mode: 'manual',
                    label: 'Open in a new tab',
                    attributes: {
                        target: '_blank',
                        rel: 'noopener noreferrer'
                    }
                }
            }
           },
            image: {
			toolbar: [ 'imageStyle:full', 'imageStyle:side', '|', 'imageTextAlternative' ],
			upload: {
				types: [ 'jpeg', 'png', 'gif', 'bmp', 'svg+xml' ]
			}
		}
        }
        )
        .catch( error => {
            console.error( error );
        } );
</script>
    <script>

    ClassicEditor
        .create( document.querySelector( '#editor12' ), { 
        ckfinder: {
            uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        },
            plugins: [ 'Autoformat','BlockQuote','Bold','CKFinder','CKFinderUploadAdapter','Essentials','Heading','Image','ImageCaption','ImageStyle','ImageToolbar','ImageUpload','Indent','Italic','Link','List','MediaEmbed','Paragraph','PasteFromOffice','Table','TableToolbar','TextTransformation' ], 
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'NumberedList', 'BulletedList', 'blockQuote', 'Outdent', 'Indent', 'custombutton', 'ckfinder', 'insertTable', 'undo', 'redo', '|', 'code'],
              link: {
            decorators: {
                openInNewTab: {
                    mode: 'manual',
                    label: 'Open in a new tab',
                    attributes: {
                        target: '_blank',
                        rel: 'noopener noreferrer'
                    }
                }
            }
           },
            image: {
            toolbar: [ 'imageStyle:full', 'imageStyle:side', '|', 'imageTextAlternative' ],
            upload: {
                types: [ 'jpeg', 'png', 'gif', 'bmp', 'svg+xml' ]
            }
        }
        }
        )
        .catch( error => {
            console.error( error );
        } );
</script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor2' ), { 
			ckfinder: {
			uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
		},
            plugins: [ 'Autoformat','BlockQuote','Bold','CKFinder','CKFinderUploadAdapter','Essentials','Heading','Image','ImageCaption','ImageStyle','ImageToolbar','ImageUpload','Indent','Italic','Link','List','MediaEmbed','Paragraph','PasteFromOffice','Table','TableToolbar','TextTransformation' ], 
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'NumberedList', 'BulletedList', 'blockQuote', 'Outdent', 'Indent', 'custombutton', 'ckfinder', 'insertTable', 'undo', 'redo'],
			  link: {
            decorators: {
                openInNewTab: {
                    mode: 'manual',
                    label: 'Open in a new tab',
                    attributes: {
                        target: '_blank',
                        rel: 'noopener noreferrer'
                    }
                }
            }
           }
        } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor3' ), { 
			ckfinder: {
			uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
		},
            plugins: [ 'Autoformat','BlockQuote','Bold','CKFinder','CKFinderUploadAdapter','Essentials','Heading','Image','ImageCaption','ImageStyle','ImageToolbar','ImageUpload','Indent','Italic','Link','List','MediaEmbed','Paragraph','PasteFromOffice','Table','TableToolbar','TextTransformation' ], 
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'NumberedList', 'BulletedList', 'blockQuote', 'Outdent', 'Indent', 'custombutton', 'ckfinder', 'insertTable', 'undo', 'redo'],
			  link: {
            decorators: {
                openInNewTab: {
                    mode: 'manual',
                    label: 'Open in a new tab',
                    attributes: {
                        target: '_blank',
                        rel: 'noopener noreferrer'
                    }
                }
            }
           }
        } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor4' ), { 
			ckfinder: {
			uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
		},
            plugins: [ 'Autoformat','BlockQuote','Bold','CKFinder','CKFinderUploadAdapter','Essentials','Heading','Image','ImageCaption','ImageStyle','ImageToolbar','ImageUpload','Indent','Italic','Link','List','MediaEmbed','Paragraph','PasteFromOffice','Table','TableToolbar','TextTransformation' ], 
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'NumberedList', 'BulletedList', 'blockQuote', 'Outdent', 'Indent', 'custombutton', 'ckfinder', 'insertTable', 'undo', 'redo'],
			  link: {
            decorators: {
                openInNewTab: {
                    mode: 'manual',
                    label: 'Open in a new tab',
                    attributes: {
                        target: '_blank',
                        rel: 'noopener noreferrer'
                    }
                }
            }
           }
        } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
    
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor5' ), { 
			ckfinder: {
			uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
		},
            plugins: [ 'Autoformat','BlockQuote','Bold','CKFinder','CKFinderUploadAdapter','Essentials','Heading','Image','ImageCaption','ImageStyle','ImageToolbar','ImageUpload','Indent','Italic','Link','List','MediaEmbed','Paragraph','PasteFromOffice','Table','TableToolbar','TextTransformation' ], 
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'NumberedList', 'BulletedList', 'blockQuote', 'Outdent', 'Indent', 'custombutton', 'ckfinder', 'insertTable', 'undo', 'redo'],
			  link: {
            decorators: {
                openInNewTab: {
                    mode: 'manual',
                    label: 'Open in a new tab',
                    attributes: {
                        target: '_blank',
                        rel: 'noopener noreferrer'
                    }
                }
            }
           }
        } )
            .catch( error => {
                console.error( error );
            } );
    </script>
     
     <script>
        ClassicEditor
            .create( document.querySelector( '#editor6' ), { 
			ckfinder: {
			uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
		},
            plugins: [ 'Autoformat','BlockQuote','Bold','CKFinder','CKFinderUploadAdapter','Essentials','Heading','Image','ImageCaption','ImageStyle','ImageToolbar','ImageUpload','Indent','Italic','Link','List','MediaEmbed','Paragraph','PasteFromOffice','Table','TableToolbar','TextTransformation' ], 
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'NumberedList', 'BulletedList', 'blockQuote', 'Outdent', 'Indent', 'custombutton', 'ckfinder', 'insertTable', 'undo', 'redo'],
			  link: {
            decorators: {
                openInNewTab: {
                    mode: 'manual',
                    label: 'Open in a new tab',
                    attributes: {
                        target: '_blank',
                        rel: 'noopener noreferrer'
                    }
                }
            }
           }
        } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor7' ), { 
            ckfinder: {
            uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        },
            plugins: [ 'Autoformat','BlockQuote','Bold','CKFinder','CKFinderUploadAdapter','Essentials','Heading','Image','ImageCaption','ImageStyle','ImageToolbar','ImageUpload','Indent','Italic','Link','List','MediaEmbed','Paragraph','PasteFromOffice','Table','TableToolbar','TextTransformation' ], 
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'NumberedList', 'BulletedList', 'blockQuote', 'Outdent', 'Indent', 'custombutton', 'ckfinder', 'insertTable', 'undo', 'redo'],
              link: {
            decorators: {
                openInNewTab: {
                    mode: 'manual',
                    label: 'Open in a new tab',
                    attributes: {
                        target: '_blank',
                        rel: 'noopener noreferrer'
                    }
                }
            }
           }
        } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor8' ), { 
            ckfinder: {
            uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        },
            plugins: [ 'Autoformat','BlockQuote','Bold','CKFinder','CKFinderUploadAdapter','Essentials','Heading','Image','ImageCaption','ImageStyle','ImageToolbar','ImageUpload','Indent','Italic','Link','List','MediaEmbed','Paragraph','PasteFromOffice','Table','TableToolbar','TextTransformation' ], 
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'NumberedList', 'BulletedList', 'blockQuote', 'Outdent', 'Indent', 'custombutton', 'ckfinder', 'insertTable', 'undo', 'redo'],
              link: {
            decorators: {
                openInNewTab: {
                    mode: 'manual',
                    label: 'Open in a new tab',
                    attributes: {
                        target: '_blank',
                        rel: 'noopener noreferrer'
                    }
                }
            }
           }
        } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
    
    <script type="text/javascript">
    $('#add-bargraph').on('click', function(){
        var key = parseInt($('#tbody-bargraph tr').last().attr('data-row')) + 1;
        $('<tr/>').attr('data-row', key).append(
            $('<td/>').append('<input class="form-control" type="text" name="bargraph[' + key + '][xValues]">')
            ).append(
            $('<td/>').append('<input class="form-control" type="text" name="bargraph[' + key + '][yValues]">')
            ).append(
            $('<td/>').append('<input class="form-control" type="text" value="blue" name="bargraph[' + key + '][barColors]">')
            ).append(
            $('<td/>').append('<input class="form-control" type="text" name="bargraph[' + key + '][bar_fake]">')
            ).append(
            $('<td/>').append('<button class="btn btn-danger btn-sm px-3 py-1" type="button" onclick="$(this).closest(\'tr\').remove();"><i class="fa fa-minus" aria-hidden="true"></i></button>')
            )
        .appendTo($('#tbl-bargraph > #tbody-bargraph'));    
    });
    $('#add-piechart').on('click', function(){
        var key = parseInt($('#tbody-piechart tr').last().attr('data-row')) + 1;
        $('<tr/>').attr('data-row', key).append(
            $('<td/>').append('<input class="form-control" type="text" name="piechart[' + key + '][xValues]">')
            ).append(
            $('<td/>').append('<input class="form-control" type="text" name="piechart[' + key + '][yValues]">')
            ).append(
            $('<td/>').append('<input class="form-control" type="text" name="piechart[' + key + '][pieColors]">')
            ).append(
            $('<td/>').append('<input class="form-control" type="text" name="piechart[' + key + '][pie_fake]">')
            ).append(
            $('<td/>').append('<button class="btn btn-danger btn-sm px-3 py-1" type="button" onclick="$(this).closest(\'tr\').remove();"><i class="fa fa-minus" aria-hidden="true"></i></button>')
            )
        .appendTo($('#tbl-piechart > #tbody-piechart'));    
    });
</script>
    
    
    <!-- Select2 -->
    <script src="{{URL::asset('public/masters/js/plugins/select2.min.js')}}"></script>
   <script type="text/javascript">
      $('#sl').click(function(){
      	$('#tl').loadingBtn();
      	$('#tb').loadingBtn({ text : "Signing In"});
      });
      
      $('#el').click(function(){
      	$('#tl').loadingBtnComplete();
      	$('#tb').loadingBtnComplete({ html : "Sign In"});
      });
      
      $('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
      
      $('#demoSelect').select2();
    </script>
    
    <script type="text/javascript">
             $(document).ready(function() {
                $('#example').DataTable();
            } );

             $(function() {
                $('.table-responsive').responsiveTable({
                    addDisplayAllBtn: 'btn btn-secondary'
                });
            });
         </script>
    
    <script type="text/javascript">
        var data = {
            labels: ["January", "February", "March", "April", "May"],
            datasets: [{
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86]
                }
            ]
        };
        var pdata = [{
                value: 300,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Complete"
            },
            {
                value: 50,
                color: "#F7464A",
                highlight: "#FF5A5E",
                label: "In-Progress"
            }
        ]

        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxp = $("#pieChartDemo").get(0).getContext("2d");
        var pieChart = new Chart(ctxp).Pie(pdata);

    </script>
    
    <!-- Google analytics script-->

</body>

</html>