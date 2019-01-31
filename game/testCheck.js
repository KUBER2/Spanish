
$("#checkButton").on('click', function () { checkQuiz();});

var givenAnswers = [];
var correctAnswers =0;
var inCorrect = 0;
var wrongAnswerMsg = "Złe odpowiedzi: \n";

function checkQuiz(){

 
  
  for(var i =0; i<numberOfQuestions;i++){
	
    givenAnswers.push(($(inputIds[i]).val()));
	
	if(givenAnswers[i]==answers[i]){		
		($(inputIds[i])).addClass("bg-success");
		correctAnswers++;
	}else{		
		($(inputIds[i])).addClass("bg-danger");
		inCorrect++;
		wrongAnswerMsg += "Opowiedziałeś: " + givenAnswers[i] + ", zamiast: " + answers[i] + ".\n";
	}
  }
  console.log(inputIds);
  console.log(givenAnswers);
  var sumaryMsg = "Opowiedziałeś poprwanie na " + correctAnswers + " z " + numberOfQuestions + " pytań.";
  //alert(alertMsg);
  $("#mesageParagraf").css("display","initial");
  $("#mesageDiv").css("display","initial");
  $("#spanishPolish").css("display","initial");
  $("#polishSpanish").css("display","initial");
  $("#checkButton").css("display","none");
  $("#mesageParagraf").text(sumaryMsg);
}
