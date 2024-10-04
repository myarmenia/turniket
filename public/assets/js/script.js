let cont = `<div class="profile-card">
                <div class="profile-image">
                    <img src="/assets/images/person.avif" alt="User Photo">
                </div>
                <div class="profile-info">
                    <h2 class="name">Անի Արամյան</h2>
                    <p class="login-date" id="dateTime">Last login: October 2, 2024</p>
                </div>
            </div>`

window.Echo.channel('show-person')
    .listen('ShowPersonEvent', (e) => {

        document.getElementById('result').innerHTML = cont
        dateTime.innerHTML = e.data.date

        setTimeout(() => {
            document.getElementById('result').innerHTML = ''
        }, 15000);
    });
