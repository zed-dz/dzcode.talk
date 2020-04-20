package tp7;

public class tp7 {

    public static void main(String[] args) {
int A ;
try {
A = 1 / Integer.parseInt (args [0] ) ;
}
catch ( RuntimeException e ) {
System.out. println ( " Runtime "+e. getMessage()) ;
}
/*catch ( IndexOutOfBoundsException e) {
System.out. println ( " Index "+e. getMessage() ) ;
}
catch ( ArithmeticException e ) {
System.out.println ( " Arithmetic "+e.getMessage()) ;
}
 */
    }}
