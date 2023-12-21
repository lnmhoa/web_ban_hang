<?php

function success($tb,$link){
    echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "'.$tb.'",
            icon: "success",
            showConfirmButton: true,
        }).then(function(){
            window.location.assign("'.$link.'");
        });
    </script>'; 
}

function error($tb,$link){
    echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "'.$tb.'",
            icon: "error",
            showConfirmButton: true,
        }).then(function(){
            window.location.assign("'.$link.'");
        });
    </script>'; 
}

function warning($tb,$link){
    echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "'.$tb.'",
            icon: "warning",
            showConfirmButton: true,
        }).then(function(){
            window.location.assign("'.$link.'");
        });
    </script>'; 
}

?>