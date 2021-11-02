
//reference message collection

var messagesRef = firebase.database().ref('messages');



//listen for form submit..

document.getElementById('contactForm').addEventListener('submit',submitForm);

function submitForm(e){
    e.preventDefault();



//Get values of different field like fullName, contact, message, email

var name = getInputVal('name');
var contact = getInputVal('contact');
var email = getInputVal('email');
var message = getInputVal('message');

// sev message function to firebase   
saveMessage(name,contact, email,message);

//showing alert after form submit..

document.querySelector('.alert').style.display = "block";


// to remove alert after 3 sec

setTimeout(function(){
    document.querySelector('.alert').style.display = "none";

},3000);


// to reset form after form submit


document.getElementById('contactForm').reset();
}

//function to get form value..

function getInputVal(id){

    return document.getElementById(id).value;
}





//save the messages to the firebase...

function saveMessage(name,contact,email,message){
    var newMessageRef = messagesRef.push(); 
    newMessageRef.set({
        message :  message,
        name :name,
        contact :contact,
        email : email,
        message :  message,

    });
}