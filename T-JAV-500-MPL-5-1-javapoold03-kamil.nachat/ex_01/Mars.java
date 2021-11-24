public class Mars {
    static int id = -1;    
    public int getId() {
        id++;
        return id;
    }
    public static void main ( String [] args ) {
        Mars rocks = new Mars() ;
        Mars lite = new Mars() ;
        Mars snack = new Mars() ;
        System . out . println( rocks.getId() ) ;
        System . out . println( lite.getId() ) ;
        System . out . println( snack.getId() ) ;
    }
}