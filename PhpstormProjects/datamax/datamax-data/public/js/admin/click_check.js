function DisableButton(btn){
    btn.disabled=true;
    btn.value='送信中...';
    btn.form.submit();
}
