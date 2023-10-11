var myImages9 = new Array();
myImages9[0] = "main_imgs/9c.jpg";
myImages9[1] = "main_imgs/9c(1).jpg";
myImages9[2] = "main_imgs/9c(2).jpg";
myImages9[3] = "main_imgs/9c(3).jpg";
var i9 = 0;
var delay9;
function change9()
    {
        if(i9==0)
            {
                document.getElementById('img9').title = "Ahmedabad's Chaniya Choli";
                document.getElementById('img9').src = myImages9[0];
                i9++;
            }
        else if(i9==1)
            {
                document.getElementById('img9').title = "Anand's Mathiya";
                document.getElementById('img9').src = myImages9[1];
                i9++;
            }
        else if(i9==2)
            {
                document.getElementById('img9').title = "Bharuch's Kharising";
                document.getElementById('img9').src = myImages9[2];
                i9++;
            }
        else if(i9==3)
            {
                document.getElementById('img9').title = "Vadodara's Lilo Chevdo";
                document.getElementById('img9').src = myImages9[3];
                i9=0;
            }
        else
            {
                
            }
        delay9 = setTimeout("change9()",2500);
            
    }
function change(x)
    {
        if(x.id=="img2")
            {
                x.src="main_imgs/2c.jpg";
            }
        else if(x.id=="img7")
            {
                x.src="main_imgs/7c.jpg";
            }
    }

    function changeover(y)
    {
        if(y.id=="img2")
            {
                y.src="main_imgs/2.png";
            }
        else if(y.id=="img7")
            {
                y.src="main_imgs/7.png";
            }
        else if(y.id=="img9")
            {
                clearTimeout(delay9);
                y.src="main_imgs/9.png";
            }
    }