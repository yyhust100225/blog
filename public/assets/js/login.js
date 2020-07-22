$(function(){

});

function toaAlert(level, message, fn)
{
    toastr.options.closeButton = false;
    toastr.options.positionClass = 'toast-top-center';
    toastr.options.showDuration = 1000;
    toastr.options.timeOut = 1500;
    toastr.options.onHidden = fn;
    toastr[level](message);
}
