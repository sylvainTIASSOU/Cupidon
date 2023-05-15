let xhr = new XMLHttpRequest();
xhr.onreadystatechange = function()
{
    if(xhr.readyState == 4)
    {
        if(xhr.status)
        {
            let reponse = xhr.responseText;
            if(reponse == "success")
            {
                location.href = "../page/Connexion.php";
            }
        }
    }

    xhr.open("POST", "../../traitement/inscriptionAction11.php", true);
    xhr.send();
}