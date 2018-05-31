
package contrrolflowdiagram;

public class graph {

    private int id;
    private String statement;
    private graph trueEnd;
    private graph falseEnd;
    private boolean forLoop = false;

    public graph(int id) {
        this.id = id;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getStatement() {
        return statement;
    }

    public void setStatement(String statement) {
        this.statement = statement;
    }

    public graph getTrueEnd() {
        return trueEnd;
    }

    public void setTrueEnd(graph trueEnd) {
        this.trueEnd = trueEnd;
    }

    public graph getFasleEnd() {
        return falseEnd;
    }

    public void setFalseEnd(graph leftEnd) {
        this.falseEnd = leftEnd;
    }

    public boolean isForLoop() {
        return forLoop;
    }

    public void setForLoop(boolean forLoop) {
        this.forLoop = forLoop;
    }

}
