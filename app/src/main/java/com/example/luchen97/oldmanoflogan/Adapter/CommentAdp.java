package com.example.luchen97.oldmanoflogan.Adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import com.example.luchen97.oldmanoflogan.Entries.Comment;
import com.example.luchen97.oldmanoflogan.R;

import java.util.ArrayList;

/**
 * Created by LUCHEN97 on 3/22/2018.
 */

public class CommentAdp extends BaseAdapter {
    ArrayList<Comment> comments;
    Context context;

    public CommentAdp(ArrayList<Comment> comments, Context context) {
        this.comments = comments;
        this.context = context;
    }

    @Override
    public int getCount() {
        return comments.size();
    }

    @Override
    public Object getItem(int position) {
        return comments.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        viewhodler viewhodler;
        if (convertView == null) {
            convertView = LayoutInflater.from(context).inflate(R.layout.listcommentcus, null);
            viewhodler = new viewhodler();
            viewhodler.Username = (TextView) convertView.findViewById(R.id.Username1);
            viewhodler.Comment = (TextView) convertView.findViewById(R.id.comment1);
            Comment comment= (Comment) getItem(position);
            viewhodler.Username.setText(comment.getUsername());
            viewhodler.Comment.setText(comment.getComment());
        }
        return convertView;
    }

    public class viewhodler {
        TextView Username;
        TextView Comment;
    }
}
