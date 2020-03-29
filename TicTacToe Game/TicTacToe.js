// Array of main board
var board = new Array(3);
for (let i=0; i <3; i++)
    board[i]=new Array(3);
// elements id
var id;
// to change players
var count=0;
// winner of game
var winner='';
// game tie
var tie=false;
// UI elements
var player1 =$('#player1')[0];
var player2 =$('#player2')[0];
var win_h1 =$('#win')[0];

// 1st turn is of player1 
player1.style.background="darksalmon";

  //Tract clicked boxes
function tract_box(event){
	
	// play game, if no body won yet!
	if (winner=='') {

	// get id of clicked box
	id = event.id;
	// tract player, based on clickes
	++count;
	// get row and column value
	let  i = id.substring(0,1);
	let  j = id.substring(1,2);

	// For 2nd player
	if (count%2 == 0) {
	    markMeCross(id)
	    // add cross in board array
	    if (board[i][j]== null) {
	    	board[i][j]='c';
	    }
	     // UI indicator, Next turn is of player1
		player1.style.background="darksalmon";
		player2.style.background="none";
	}else{
		// For 1st player
		markMeTick(id);
		// add tick in board array
		 if (board[i][j] == null) {
	    	board[i][j]='t';
	    }
	     // UI indicator, Next turn is of player2
		player2.style.background="darksalmon";
		player1.style.background="none";
	}
	 console.log(board);
	 // check winner
	    win();
	} 
	else {
		if (tie==true) 
			alert("The game ended with tie!");
		else
			alert(winner+" won the game! better luck next time.");
	}

	}

// mark with tick symbol
function markMeTick(id){
// get element from id
let elmnt = $("#"+id)[0];
elmnt.classList.add('tick');
// if clicked once element should not react to pointer events
elmnt.style.pointerEvents = "none";

}

// mark with cross symbol
function markMeCross(id){
// get element from id
let elmnt = $("#"+id)[0];
elmnt.classList.add('cross');
}

// Check win conditions
function win(){
// win condition in row
win_row_condition();
// win condition in column
win_col_condition();
// win condition in disgonal
win_diag_condition();
//check for tie
tie_condition();

}


function win_row_condition(){
	     // iterator Variables
	     let i, j = 0;

	// iterate through each row
	for ( i = 0; i < 3; i++) {
		// count tick in rows
		let row_count_T = 0;
		// count cross in rows
		let row_count_C = 0;

		// count in each row
		for (j = 0; j < 3; j++){

			if (board[i][j]=='t') {
				row_count_T++;
			}
			else if (board[i][j]=='c') {
				row_count_C++;
			}
			// if more than 2 cross in any row, cross wins
			if (row_count_C>2) {
				win_h1.innerHTML = 'Player2 Won!';
				winner='Player2';
			}
			// if more than 2 ticks in any row, tick wins
			if (row_count_T>2) {
				win_h1.innerHTML = 'Player1 Won!';
				winner='Player1';
			}
		}

		
	}
}

function win_col_condition(){
      
        // iterator Variables
	     let i, j = 0;
       	
       // iterate through each row
    	for ( i = 0; i < 3; i++) {

        // count tick in columns
		let col_count_T = 0;
		// count cross in columns
		let col_count_C = 0;

        // count in each row
		for (j = 0; j < 3; j++){

			// count in each column
		if (board[j][i]=='t') {
				col_count_T++;
			}
			else if (board[j][i]=='c') {
				col_count_C++;
			}

		// if more than 2 cross in any column, cross wins
		if (col_count_C>2) {
				win_h1.innerHTML = 'Player2 Won!';
				winner='Player2';
		}
		// if more than 2 ticks in any column, tick wins
		if (col_count_T>2) {
				win_h1.innerHTML = 'Player1 Won!';
				winner='Player1';
		}
		}

	}
}

function win_diag_condition(){
	// iterator Variables
	     let i, j = 0;
       	// count tick in diagonals
		let diag_count_T = 0;
		// count cross in diagonals
		let diag_count_C = 0;

       // iterate through right diagonal
    	for ( i = 0; i < 3; i++) {

        
		if (board[j][i]=='t') {
				diag_count_T++;
			}
			else if (board[j][i]=='c') {
				diag_count_C++;
			}
			j++;
			// if more than 2 cross in diagonal, cross wins
			if (diag_count_C>2) {
				win_h1.innerHTML = 'Player2 Won!';
				winner='Player2';
			}
			// if more than 2 ticks in diagonal, tick wins
			if (diag_count_T>2) {
				win_h1.innerHTML = 'Player1 Won!';
				winner='Player1';
			}
		}

		 // iterate through left diagonal
		 // iterator Variables
	      i=0;
	      j=2; 
	      diag_count_T=0;diag_count_C= 0;
       
    	for ( i = 0; i < 3; i++) {

        
		if (board[j][i]=='t') {
				diag_count_T++;
			}
			else if (board[j][i]=='c') {
				diag_count_C++;
			}
			j--;
			// if more than 2 cross in diagonal, cross wins
			if (diag_count_C>2) {
				win_h1.innerHTML = 'Player2 Won!';
				winner='Player2';
			}
			// if more than 2 ticks in diagonal, tick wins
			if (diag_count_T>2) {
				win_h1.innerHTML = 'Player1 Won!';
				winner='Player1';
			}
		}
	}

	function tie_condition(){
		// if no one won
		if (winner=='') {
			// and board is full with ticks & crosses / doesn't include any null space
			let checkTie =true;
			for ( let i = 0; i < 3; i++) {
				for (let j = 0; j < 3; j++) {
					if (typeof(board[i][j])=='undefined') {
						checkTie=false;
						break;
					}
				}
			}

			if (checkTie) {
				tie = true;
				win_h1.innerHTML = 'The game ended with tie!';
				winner='None';
			}

		}
	}