function previewImage(obj, preview_id)
{
    console.log(preview_id);
    let fileReader = new FileReader();
    fileReader.onload = (function() {
        document.getElementById(preview_id).src = fileReader.result;
    });
    fileReader.readAsDataURL(obj.files[0]);
}
