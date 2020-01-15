<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link  href="/css/cropper.min.css" rel="stylesheet">

    <title>Hello, world!</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="max-height:500px;">
                <button type="button" class="btn btn-secondary" onclick="zoom(1)">+</button>
                <button type="button" class="btn btn-secondary" onclick="zoom(2)">-</button>
                <img id="image" src="/img/Capture.png" class="img-fluid m-5">
                
                <form action="/post_image" method="POST" enctype="multipart/form-data" id="post_image">
                    @csrf
                    <input type="text" class="form-control" id="crop_input" name="crop_input">
                    <button type="button" class="btn btn-secondary" onclick="crop()">Submit</button>
                </form>
            </div>
            
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="/js/jquery-3.4.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="/js/cropper.min.js"></script>


    <script>
    const image = document.getElementById('image');


const cropper = new Cropper(image, {
        aspectRatio: 1 / 1,
        viewMode: 1,
        dragMode: 'move',
        autoCropArea: 1,
        cropBoxMovable: false,
        cropBoxResizable: false,
        toggleDragModeOnDblclick: false,
        minCroppedWidth: 200,
        maxCroppedHeight: 300, 
    crop(event) {

     

    },
});

function zoom(z){
    if(z == 1){
        cropper.zoom(0.1);
    } else if(z == 2){
        cropper.zoom(-0.1);
    }
}

function crop(){
    cropper.getCroppedCanvas().toBlob((blob) => {


 var reader = new FileReader();
 reader.readAsDataURL(blob); 
 reader.onloadend = function() {
     var base64data = reader.result;                
     document.getElementById("crop_input").value = base64data;

           setTimeout(function(){ 
        document.getElementById("post_image").submit();
        }, 500);
 }

    

  

        // const formData = new FormData();

        // formData.append('crop_input', blob, 'example.png');




        // $.ajax('/post_image', {
        //     headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     method: "POST",
        //     data: formData,
        //     processData: false,
        //     contentType: false,
        //     success: function (response) {

        //         console.log(response);
        //     },
        //     error: function () {
        //     }
        // });
    });




}



    </script>
  </body>
</html>