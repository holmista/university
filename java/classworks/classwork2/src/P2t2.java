public class P2t2 {
    int x;
    P2t2(){};
    P2t2(int x){
        this.x = x;
    };
    public boolean between(int start, int end){
        return x >= start && x <= end;
    }
}
