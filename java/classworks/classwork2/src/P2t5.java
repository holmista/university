public class P2t5 {
    float x,y;
    P2t5(){};
    P2t5(int x){
        this.x = x;
    };
    public boolean isXZero(){
        return this.x == 0;
    }
    public float getMin(){
        return Math.min(this.x, this.y);
    }
}
