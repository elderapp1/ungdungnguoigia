package com.example.luchen97.oldmanoflogan.Adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.luchen97.oldmanoflogan.Entries.Setting;
import com.example.luchen97.oldmanoflogan.R;

import java.util.ArrayList;

/**
 * Created by LUCHEN97 on 3/27/2018.
 */

public class SettingAdp extends BaseAdapter {
    Context context;
    ArrayList<Setting> strings;

    public SettingAdp(Context context, ArrayList<Setting> strings) {
        this.context = context;
        this.strings = strings;
    }

    @Override
    public int getCount() {
        return strings.size();
    }

    @Override
    public Object getItem(int position) {
        return strings.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        viewhodler viewhodler = new viewhodler();
        convertView = LayoutInflater.from(context).inflate(R.layout.setting, null);
        viewhodler.imageView = (ImageView) convertView.findViewById(R.id.iconsetting);
        viewhodler.textView = (TextView) convertView.findViewById(R.id.titlesetting);
        Setting setting = (Setting) getItem(position);
        viewhodler.imageView.setImageResource(setting.getAnInt());
        viewhodler.textView.setText(setting.getTitle());
        return convertView;
    }

    private class viewhodler {
        ImageView imageView;
        TextView textView;
    }
}
