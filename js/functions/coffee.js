function validateForm(destination)
{
    msg = "* Preencha os campos obrigatórios. *";
    empty = 0;

    document.getElementById('error-msg').innerHTML = '';

    f_name = document.getElementById('name').value;
    f_description = document.getElementById('description').value;

    if (f_name == '') empty++;
    if (f_description == '') empty++;

    if (empty > 0)
    {
        document.getElementById('error-msg').innerHTML = msg;
        return false;
    }

    document.coffeeform.action = destination;
    document.coffeeform.submit();
}