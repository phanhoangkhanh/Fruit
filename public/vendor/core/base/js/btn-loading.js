var path_resource = window.location.protocol + "//" + window.location.hostname + "/";
var background = [
    { color: 'rgb(195, 0, 123, 0.4)', image: path_resource + "vendor/core/base/images/loading/cat.gif", repeat: 'no-repeat' },
    { color: 'rgb(195, 0, 123, 0.4)', image: path_resource + "vendor/core/base/images/loading/cat2.gif", repeat: 'no-repeat' },
    { color: 'rgba(0, 0, 123,0.4)', image: path_resource + "vendor/core/base/images/loading/nyan-cat.gif", repeat: 'no-repeat' },
    { color: 'rgb(122, 174, 123, 0.4)', image: path_resource + "vendor/core/base/images/loading/duck.gif", repeat: 'no-repeat' },
    { color: 'rgb(239, 194, 123, 0.4)', image: path_resource + "vendor/core/base/images/loading/cat4.gif", repeat: 'no-repeat' },
    { color: 'rgb(239, 194, 242, 0.4)', image: path_resource + "vendor/core/base/images/loading/cat5.gif", repeat: 'no-repeat' },
    { color: 'rgb(255, 194, 242, 0.4)', image: path_resource + "vendor/core/base/images/loading/girl.gif", repeat: 'no-repeat' },
    { color: 'rgb(255, 194, 242, 0.4)', image: path_resource + "vendor/core/base/images/loading/dog-1.gif", repeat: 'no-repeat' },
    { color: 'rgb(142, 194, 242, 0.4)', image: path_resource + "vendor/core/base/images/loading/cat6.gif", repeat: 'no-repeat' },
    { color: 'rgb(239, 194, 123, 0.4)', image: path_resource + "vendor/core/base/images/loading/cat7.gif", repeat: 'no-repeat' },
    { color: 'rgb(0, 1, 1, 0.4)', image: path_resource + "vendor/core/base/images/loading/dog2.gif", repeat: 'no-repeat' },
    { color: 'rgb(0, 1, 1, 0.4)', image: path_resource + "vendor/core/base/images/loading/pen.gif", repeat: 'no-repeat' },
    { color: 'rgb(210, 21, 213, 0.4)', image: path_resource + "vendor/core/base/images/loading/cloud.gif", repeat: 'no-repeat' },
    { color: 'rgb(195, 0, 123, 0.4)', image: path_resource + "vendor/core/base/images/loading/cat8.gif", repeat: 'no-repeat' },
    { color: 'rgba(0, 0, 123,0.4)', image: path_resource + "vendor/core/base/images/loading/love.gif", repeat: 'repeat' },
    { color: 'rgba(236, 240, 241, 0.4)', image: path_resource + "vendor/core/base/images/loading/cat-9.gif", repeat: 'no-repeat' },
    { color: 'rgba(236, 240, 241, 0.4)', image: path_resource + "vendor/core/base/images/loading/cat-10.gif", repeat: 'no-repeat' },
    { color: 'rgba(236, 240, 241, 0.4)', image: path_resource + "vendor/core/base/images/loading/cat-11.gif", repeat: 'no-repeat' },
    { color: 'rgba(236, 240, 241, 0.4)', image: path_resource + "vendor/core/base/images/loading/cat-12.gif", repeat: 'no-repeat' },
    { color: 'rgba(236, 240, 241, 0.4)', image: path_resource + "vendor/core/base/images/loading/cat-13.gif", repeat: 'no-repeat' },
    { color: 'rgba(236, 240, 241, 0.4)', image: path_resource + "vendor/core/base/images/loading/cat-19.gif", repeat: 'no-repeat' },
    { color: 'rgba(243, 156, 18, 0.4)', image: path_resource + "vendor/core/base/images/loading/ami-1.gif", repeat: 'no-repeat' },
    { color: 'rgba(243, 156, 18, 0.4)', image: path_resource + "vendor/core/base/images/loading/ami-2.gif", repeat: 'no-repeat' },
    { color: 'rgba(243, 156, 18, 0.4)', image: path_resource + "vendor/core/base/images/loading/ami-3.gif", repeat: 'no-repeat' },
];
function get_random(list) {
    return list[Math.floor((Math.random()*list.length))];
}

$('body').on('click', '.btn-loading', function(){
    var get = get_random(background);
    Swal.fire({
        title: 'Loading',
        html: "<i class='anticon anticon-loading'></i>",
        timerProgressBar: true,
        timer: 9999999,
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false,
        width: 700,
        padding: '3em',
        background: '#fff',
        backdrop: get.color +` url("`+get.image+`") left top `+ get.repeat
    })
})
