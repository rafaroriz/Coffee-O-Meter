function validateForm(destination)
{
    msg = "* Preencha os campos obrigatórios. *";
    empty = 0;

    document.getElementById('error-msg').innerHTML = '';

    f_name = document.getElementById('name').value;

    if (f_name == '') empty++;

    if (empty > 0)
    {
        document.getElementById('error-msg').innerHTML = msg;
        return false;
    }

    document.typeform.action = destination;
    document.typeform.submit();
}