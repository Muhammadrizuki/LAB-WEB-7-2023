function bubbleSort(arr) {
    var n = arr.length;
    var swapped;
    
    do {
      swapped = false;
      
      for (var i = 0; i < n - 1; i++) {
        if (arr[i] > arr[i + 1]) {
          var temp = arr[i];
          arr[i] = arr[i + 1];
          arr[i + 1] = temp;
          swapped = true;
        }
      }
      
      // Perulangan berakhir jika tidak ada pertukaran
    } while (swapped);
  }
  
  var n = 5;
  var array = [50, 20, 1, 45, 3];
  
  bubbleSort(array)
  console.log(array); 

