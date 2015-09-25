#include <iostream>
#include "testapi.h"
#include <cassert>
using namespace std;


int main(){
    assert(false);
    if(sum(0, 0) == 0){
        cout << "Suma correcta";
    }else{
        cout << "No sabe sumar 0s";
    }

}
