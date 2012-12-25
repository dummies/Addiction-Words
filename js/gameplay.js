// JavaScript Document
var val =false;
var tab = [false ,false ,false ,false ,false ,false ,false ,false ,false ,false ,false ,false ,false ,false ,false ,false];
var str ="",prev =-1;
var score =0;
var truth;
var words;



function loadwords()
{
var xhr = new XMLHttpRequest();
xhr.open('GET', 'Data/op.txt', false);
xhr.send(null);
words = xhr.responseText.split('\n');
}

function isvalidword() {
      var beginning = 0, end = words.length,target;
      while (true) {
          target = Math.floor((beginning + end) / 2);
          if ((target === end || target === beginning) && arr[target] !== ele) {
              return -1;
          }
          if (arr[target] > str) {
              end = target;
          } else if (arr[target] < str) {
              beginning = target;
          } else {
              return target;
          }
      }
  }
  
function convert(m) {
	return (parseInt((m-11)/10)*4 + (m%10) -1);
}
function changetext(td)
{
	document.getElementById(td).className ="buttoncssmod";
}
function mousedown(td ) {
	var tmp =document.getElementById(td).innerHTML;
	if(!val)
		   val =true;
    if(!tab[convert(td)]) {
	prev = convert(td)+1;
	str += tmp; 
	tab[convert(td)] =true;
	changetext(td);
	//console.log("mouse down");
	}
	
	//alert(tmp);
	//console.log(td);
}
function updatescore()
{
	var len =str.length ,validity =isvalidword();
	if(len >2 && validity != -1) {
	score += len *len;
	document.getElementById("score").innerHTML = score;
	addfoundword();
	}
	else {
		console.info("not defined");
	}
}

function mouseover(td) {
	var tmp =document.getElementById(td).innerHTML;
	if(val && !tab[convert(td)] )  {
	var curr =convert(td);
	++curr;
	var diff = Math.abs(curr -prev);
	if(diff ==1 || diff==3 || diff ==4 || diff ==5)
	{
	str += tmp;
	tab[convert(td)] =true;
	changetext(td);
	prev =curr;
	}
	//console.log("mouse over");
	}
}
function mousemove(elm) 
{
	//console.log("mouse move -outside table" +elm);
	mouseup();
}

function mouseup() {
	//alert("Mouse Up,index clicked :");
	if(val) {
	 //var url ="phplogic.php?str="+str;
	//callvalidate('phplogic.php?str='+str);
   // var truth = callvalidate(str);
   // ajaxFunction();
	updatescore();
		//console.log("mouse up");
	val =false;
	for(var i=0;i<16;++i) tab[i] =false;
			 document.getElementById("11").className ="buttoncss";
			 document.getElementById("12").className ="buttoncss";
			 document.getElementById("13").className ="buttoncss";
			 document.getElementById("14").className ="buttoncss";
			 document.getElementById("21").className ="buttoncss";
			 document.getElementById("22").className ="buttoncss";
			 document.getElementById("23").className ="buttoncss";
			 document.getElementById("24").className ="buttoncss";
			 document.getElementById("31").className ="buttoncss";
			 document.getElementById("32").className ="buttoncss";
			 document.getElementById("33").className ="buttoncss";
			 document.getElementById("34").className ="buttoncss";
			 document.getElementById("41").className ="buttoncss";
			 document.getElementById("42").className ="buttoncss";
			 document.getElementById("43").className ="buttoncss";
			 document.getElementById("44").className ="buttoncss";
	//console.log(str);
	str="";
	prev =-1;
	truth ;
	}
}
function addfoundword()
{
	var found = document.getElementById("foundwords");
	var word = document.createElement("li");
	var fword= document.createTextNode(str);
	word.appendChild(fword);
	found.appendChild(word);
}