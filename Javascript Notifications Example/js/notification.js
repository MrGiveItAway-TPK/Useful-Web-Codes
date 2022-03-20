function Execute_Notification(Title,Body,Icon,URL) {
(async () => {
    var notification = () => {
        var notificationmsg = new Notification(Title, {
            body: Body,
            icon: './img/'+Icon+''
        });

        setTimeout(() => {
            notificationmsg.close();
        }, 10 * 1000);

        notificationmsg.addEventListener('click', () => {

            window.open(URL, '_blank');
			if(parseInt(Notify_B.innerHTML)>0)
			{
			Notify_B.innerHTML=parseInt(Notify_B.innerHTML)-1;
				if(parseInt(Notify_B.innerHTML)==0)
				{
				Notify_Icon.classList.remove("red");
				}
			}
        });
    }

    var error = () => {
        var errormsg = document.querySelector('.msg');
        errormsg.textContent = 'Notification Access Blocked!';
    }

    var granted = false;

    if (Notification.permission === 'granted') {
        granted = true;
    } else if (Notification.permission !== 'denied') {
        var permission = await Notification.requestPermission();
        granted = permission === 'granted' ? true : false;
    }
	
    granted ? notification() : error();

})();
}