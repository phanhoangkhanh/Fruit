//Livewire Emit

function showToast(type, message) {
    var toastHTML = `<div class="toast fade hide" data-delay="3000">
        <div class="toast-header">
            <i class="anticon anticon-info-circle text-primary m-r-5"></i>
            <strong class="mr-auto">Thông báo</strong>
            <small>just now</small>
            <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <div class="alert alert-`+type+`">
                <div class="d-flex align-items-center justify-content-start">
                    <span class="alert-icon">
                        <i class="anticon anticon-check-o"></i>
                    </span>
                    <span>`+message+`</span>
                </div>
            </div>
        </div>
    </div>`
    $('#notification-toast').append(toastHTML)
    $('#notification-toast .toast').toast('show');
    setTimeout(function(){
        $('#notification-toast .toast:first-child').remove();
    }, 3000);
}

window.livewire.on('alert', data => {
    const type = data[0];
    const message = data[1];
    // showToast(type, message);
    Swal.fire({
        text: message,
        icon: type,
        toast: true,
        position: 'top-start',
        timer: 2000,
        showConfirmButton: false,
    })

    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('a[href="' + activeTab + '"]').tab('show');
    }
});

window.livewire.on('alert-big', data => {
    const type = data[0];
    const title = data[1];
    const message = data[2];

    setTimeout(function() {
        Swal.fire({
            icon: type,
            title: title,
            text: message,
        })
    }, 1000);
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('a[href="' + activeTab + '"]').tab('show');
    }
});

window.livewire.on('modal', data => {
    const type = data[0];
    const id = data[1];
    $(id).modal(type)
});

window.livewire.on('reload', data => {
    location.reload();
});

//Menu
var url = window.location;

$('ul.side-nav-menu a').filter(function() {
  return this.href == url;
}).parent().addClass('active');

$('ul.dropdown-menu a').filter(function() {
  return this.href == url;
}).parentsUntil(".side-nav-inner > .nav-item").addClass('open');


//Tab
$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    localStorage.setItem('activeTab', $(e.target).attr('href'));
});
var activeTab = localStorage.getItem('activeTab');
if (activeTab) {
    $('a[href="' + activeTab + '"]').tab('show');
}

//Format number
function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

//Format Date
function getFormattedDate(date) {
    var d = new Date(date)
    var year = d.getFullYear();

    var month = (1 + d.getMonth()).toString();
    month = month.length > 1 ? month : '0' + month;

    var day = d.getDate().toString();
    day = day.length > 1 ? day : '0' + day;

    return day + '/' + month + '/' + year;
}

 // Number format for Chart JS
 function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
