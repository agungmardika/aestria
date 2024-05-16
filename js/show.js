function lihat()
    {
        var password = document.getElementById('password'),
            button = document.getElementsByTagName('button')[0];

        if(button.textContent === 'Lihat Password')
        {
            password.setAttribute('type', 'text');
            button.textContent = 'Sembunyikan';
        }
        else
        {
            password.setAttribute('type', 'password');
            button.textContent = 'Lihat Password';
        }
        return false;
    }