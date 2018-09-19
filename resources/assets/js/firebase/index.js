import firebase from 'firebase/app';
import 'firebase/database'
let config = {
    apiKey: "AIzaSyA9Tq-4bePjxs2O9V3x3v6Oi8L3VpPYDBE",
    authDomain: "coworking-8535b.firebaseapp.com",
    databaseURL: "https://coworking-8535b.firebaseio.com",
};
 firebase.initializeApp(config);
 export default  firebase.database();