package codeparser;

import java.io.*;
import java.util.*;

public class AllpathParse {
    private String filePath;
    private String[] branchingWords = {"if", "else if", "for", "while", "break", "continue"};    
    private graph startingNode = new graph(0);
    private graph lastNode = startingNode;
    private graph lastIf = null;
    private graph lastBranching = null;
    private boolean Rightbranchpath = true;
    
    private Stack<graph> foundBranchings = new Stack();
    private Stack<graph> nodesToAddLast = new Stack();
    
    public AllpathParse(String filePath) {
        this.filePath = filePath;
    }
    
    public ArrayList<String> readFileAsLines() throws FileNotFoundException, IOException {
        BufferedReader reader = new BufferedReader(new FileReader(filePath));
        ArrayList<String> lines = new ArrayList();
               
        String line;
        while ((line = reader.readLine()) != null) {
            lines.add(line);
        }        
        return lines;
    }
    
    public void parseAndAssignNodes(ArrayList<String> lines) {
        
        String line;
        for (int i = 0; i < lines.size(); i++) {
            line = lines.get(i);            
            graph currentNode = new graph(i + 1);
            
            String wordFound = checkIfbranchingWord(line);
            if (wordFound != null) {
                if (wordFound.equals("continue") || wordFound.equals("break")) {
                    currentNode.setStatement(line);
                    continue;
                }
                handleBranchingLines(currentNode, line, wordFound);                                                
            }
            else {
                handleNonBranchingLines(line, currentNode);
            }
        }
    }
    
    public String branchingkeyword(String line) {
        for (String word: branchingWords) {
            if (line.contains(word.trim())) {
                return word;
            }
        }
       return null;
    }
    
    
    public void conditionhandler(graph node, String line, String wordFound) {

        lastBranching = node;
        if (line.contains("{")) {
            foundBranchings.push(node);
            lastBranching = null;
        }
       
        String expression = line.substring(
                line.indexOf("("), 
                line.lastIndexOf(")"));

        if (wordFound.equals("for")) {
            String[] tokens = expression.split(";");  
            
            node.setStatement(tokens[0]);
            addNodeToNodeTree(node);
            
            graph condNode = new graph(node.getId() + 1);                        
            condNode.setStatement(tokens[1]);
            addNodeToNodeTree(condNode);
            lastIf = condNode;
            
            nodesToAddLast.push(new graph(-1));
            return;
            //update the expression here 
        }
        if (wordFound.equals("if")) lastIf = node;
        
        node.setStatement(expression);
        addNodeToNodeTree(node);
                
    }
    
    public void handleNonBranchingLines(String line, graph node) {             
        if (line.contains(";")){
            node.setStatement(line);
            addNodeToNodeTree(node);
        }
        
        if (line.contains("{") && lastBranching != null) {
            foundBranchings.push(lastBranching);
        }
                
        if (line.contains("}" ) && lastBranching != null) {
            if (foundBranchings.pop().isForLoop()) {
                addNodeToNodeTree(nodesToAddLast.pop());
                Rightbranchpath = false;
                lastNode = lastIf;
            }
        }  
        
        if (line.contains("else")) {
            Rightbranchpath = false;
            lastNode = lastIf;
        }
    }

    private void addNodeToNodeTree(Node node) {
        if (Rightbranchpath) {
            lastNode.setTrueEnd(node);
        }        
        else {
            lastNode.setFalseEnd(node);
            Rightbranchpath = true;
        }
        lastNode = node;
    }
}
