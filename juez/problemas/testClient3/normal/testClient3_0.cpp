#include <iostream>
#include "testapi.h"
using namespace std;


int main(){
    if(sum(0, 0) == 0){
        cout << "Suma correcta";
    }else{
        cout << "No sabe sumar 0s";
    }

}
