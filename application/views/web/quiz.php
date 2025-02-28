<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Objective Test</title>
	 <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
	<style>
	body{
	font-size: 20px;
	font-family: Roboto, sans-serif;
	color: #333;
	padding:0;
	margin:0;
}
#container{
width:100%;
display:block;
padding:40px 20px;
position:relative;
margin:0;
box-sizing: border-box;
}
.question{
	font-weight: 600;
margin-bottom: 10px;
font-size: 17px;
font-family: Roboto, sans-serif;
}
.answers {
  margin-bottom: 20px;
}
.answers label{
display: block;
font-size: 16px;
line-height: 28px;
}
#submit{
font-family: sans-serif;
font-size: 17px;
background-color: #279;
color: #fff;
border: 0px;
border-radius: 3px;
padding: 10px 18px;
cursor: pointer;
margin-bottom: 20px;
}
#submit:hover{
	background-color: #38a;
}
	</style>
</head>
<body>
<!--<h4 style="color:#FF0000;" align="center" ><span id="iTimeShow">Time Remaining: </span><br/><span id='time' style="font-size:25px;"></span></h4>-->
    <div id="container">
      <div id="quiz"></div>
      <button id="submit">Submit Quiz</button>
      <div id="results"></div>
    </div>
    <script>
	
	(function(){
  function buildQuiz(){
    // variable to store the HTML output
    const output = [];
    var nm=1;
    // for each question...
    myQuestions.forEach(
      (currentQuestion, questionNumber) => {

        // variable to store the list of possible answers
        const answers = [];
        
        // and for each available answer...
        for(letter in currentQuestion.answers){

          // ...add an HTML radio button
          answers.push(
            `<label>
              <input type="radio" name="question${questionNumber}" value="${letter}">
              ${letter} :
              ${currentQuestion.answers[letter]}
            </label>`
          );
        }
       //console.log(nm);
        // add this question and its answers to the output
        output.push(
          `<div class="question">Q${nm}:  ${currentQuestion.question} </div>
          <input type="hidden" class="qut" id="qustid${nm}" value="${currentQuestion.id}" />
          <div class="answers"> ${answers.join('')} </div>`
        );
		nm++;
      }
    );

    // finally combine our output list into one string of HTML and put it on the page
    quizContainer.innerHTML = output.join('');
  }

  function showResults(){

    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll('.answers');

    // keep track of user's answers
    let numCorrect = 0;

    // for each question...
    myQuestions.forEach( (currentQuestion, questionNumber) => {

      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;
	  


      // if answer is correct
      if(userAnswer === currentQuestion.correctAnswer){
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
       // answerContainers[questionNumber].style.color = 'lightgreen';
      }
      // if answer is wrong or blank
      else{
        // color the answers red
       // answerContainers[questionNumber].style.color = 'red';
      }
    });

    // show number of correct answers out of total
    resultsContainer.innerHTML = `${numCorrect} out of ${myQuestions.length}`;
	//alert(numCorrect);
  }

  const quizContainer = document.getElementById('quiz');
  const resultsContainer = document.getElementById('results');
  const submitButton = document.getElementById('submit');
  const myQuestions = [
    {
      question: "Who invented JavaScript?",
      answers: {
        a: "Douglas Crockford",
        b: "Sheryl Sandberg",
        c: "Brendan Eich"
      },
	  id:1,
      correctAnswer: "c"
    },
    {
      question: "Which one of these is a JavaScript package manager?",
      answers: {
        a: "Node.js",
        b: "TypeScript",
        c: "npm"
      },
	  id:2,
      correctAnswer: "c"
    },
    {
      question: "Which tool can you use to ensure code quality?",
      answers: {
        a: "Angular",
        b: "jQuery",
        c: "RequireJS",
        d: "ESLint"
      },
	  id:3,
      correctAnswer: "d"
    }
  ];

  // Kick things off
  buildQuiz();

  // Event listeners
  submitButton.addEventListener('click', showResults);
  
  
})();
	</script>
   
</body>
</html>