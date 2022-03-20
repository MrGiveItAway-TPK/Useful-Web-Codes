function Notify() {
Execute_Notification("Test Title","Test Body","Test.png","redir.html");
Notify_B.innerHTML=parseInt(Notify_B.innerHTML)+1
Notify_Icon.classList.add("red");
}

function Clear_Notify() {
Notify_B.innerHTML="0";
Notify_Icon.classList.remove("red");
}

function Deduct_Notify() {
if(parseInt(Notify_B.innerHTML)>0)
	{
	Notify_B.innerHTML=parseInt(Notify_B.innerHTML)-1;
	if(parseInt(Notify_B.innerHTML)==0)
	{
	Notify_Icon.classList.remove("red");
	}
	}
}