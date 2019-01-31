
$("#spanishPolish").on('click', function () { generateQuizSpanishPolish();});
$("#polishSpanish").on('click', function () { generateQuizPolishSpanish();});



var numberOfQuestions = getCookie("numberOfQuestions");
var spanishWords = getCookieArray("spanishWord");
var polishWords = getCookieArray("polishWord");
var inputIds = [];
var answers = [];
var questions = [];

var quizeType = "";

for(var i =0; i<spanishWords.length;i++){
	spanishWords[i] = spanishWords[i].replace("+"," ");
}

function generateQuizSpanishPolish(){
  
  $("#mesageParagraf").css("display","none");
  $("#mesageDiv").css("display","none");
  quizeType = "ES-PL";
  inputIds = [];
  answers = [];
  questions = [];
  $("#spanishPolish").css("display","none");
  $("#polishSpanish").css("display","none");
  $("#checkButton").css("display","initial");
  var quiz = $("#quiz");
  quiz.removeClass("invisible");
  var trescDiva ='<h4 class = "text-center p-2 mb-2">Przetłumacz na polski poniższe wyrazy:</h4>';
  for(var i =0; i <numberOfQuestions; i++){
	var randomIndexOfWords = Math.floor(Math.random() * spanishWords.length);
	var spanishRandomWord = spanishWords[randomIndexOfWords];
	questions.push(spanishRandomWord);
	answers.push(polishWords[randomIndexOfWords]);
	spanishWords.splice(randomIndexOfWords,1);
	polishWords.splice(randomIndexOfWords,1);
	var ans = "answer" + i;
	var lab = "label" + i;
    var numberOfQuestion = i+1;
	trescDiva += '<div class = "mx-auto border border-primary p-3 mb-4">';
	trescDiva += '<div class="form-group">';
	trescDiva += '<label for="' + ans + '" id = "' + lab + '">'+ numberOfQuestion + ": " + spanishRandomWord + '</label>';
	trescDiva += '<input type="text" class="form-control" id="' + ans + '" name="' + ans + '"></div></div>';
	var currentId = '#'+ans;
	inputIds.push(currentId);
  }
  
  quiz.html(trescDiva);
}

function generateQuizPolishSpanish(){


  $("#mesageParagraf").css("display","none");
  $("#mesageDiv").css("display","none");  
  quizeType = "PL-ES";
  inputIds = [];
  $("#spanishPolish").css("display","none");
  $("#polishSpanish").css("display","none");
  $("#checkButton").css("display","initial");
  var quiz = $("#quiz");
  quiz.removeClass("invisible");
  var trescDiva ='<h4 class = "text-center p-2 mb-2">Przetłumacz na hiszpański poniższe wyrazy:</h4>';
  
  for(var i =0; i <numberOfQuestions; i++){
	var randomIndexOfWords = Math.floor(Math.random() * polishWords.length);
	var polishRandomWord = polishWords[randomIndexOfWords];
	answers.push(spanishWords[randomIndexOfWords]);
	questions.push(polishRandomWord);
	spanishWords.splice(randomIndexOfWords,1);
	polishWords.splice(randomIndexOfWords,1);
	var ans = "answer" + i;
	var lab = "label" + i;
    var numberOfQuestion = i+1;
	trescDiva += '<div class = "mx-auto border border-primary p-3 mb-4">';
	trescDiva += '<div class="form-group">';
	trescDiva += '<label for="' + ans + '" id = "' + lab + '">'+ numberOfQuestion + ": " + polishRandomWord + '</label>';
	trescDiva += '<input type="text" class="form-control" id="' + ans + '" name="' + ans + '"></div></div>';
	var currentId = '#'+ans;
	inputIds.push(currentId);
  }

  quiz.html(trescDiva);
}



function getCookieArray(cookieName) {
  var array =[];
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  
  for(var i = 0; i <ca.length; i++) {

	var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
	var extraChar = 4;
    if (c.indexOf(cookieName) == 0) {
	  if(array.length!=0){
	    //+3 is for '[]' and '='
        var extraChar = Math.floor(Math.log10(array.length))+ 1 + 3;
	  }
	  array.push(c.substring(cookieName.length + extraChar, c.length));  
	}
  }
  return array;
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}
function getAllCookies(){
  var pairs = document.cookie.split(";");
  var cookies = {};
  for (var i=0; i<pairs.length; i++){
    var pair = pairs[i].split("=");
    cookies[(pair[0]+'').trim()] = unescape(pair[1]);
  }
  return cookies;
}
