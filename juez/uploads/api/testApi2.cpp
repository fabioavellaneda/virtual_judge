#include <iostream>
#include "testapi.h"
#include <fstream>
using namespace std;


int main(){
    ofstream out("salida.txt");
    if(sum(0, 0) == 0){
        out << "Suma correcta";
    }else{
        out << "No sabe sumar 0s";
    }

    out.close();

}
