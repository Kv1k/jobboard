public class Astronaut {
    static int id = -1;  
    private String name; 
    private  int snacks = 0;
    private String destination = null;  

    public String getName() {
        return this.name;
    }
    public int getSnacks() {
        return this.snacks;
    }
    public String getDestination() {
        return this.destination;
    }
    
    public int getId() {
        id++;
        return id;
    }
    Astronaut(String name){
        System.out.println(name+" ready for launch!");
        this.name = name;
    }
    public static void main ( String [] args ) {
        Astronaut mutta = new Astronaut("Mutta") ;
        Astronaut hibito = new Astronaut("Hibito") ;
        System . out . println ( mutta . getId () ) ;
        System . out . println ( hibito . getId () ) ;
    }
    
}